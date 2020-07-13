<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\MemberSaveRequest;
use App\Http\Requests\Admin\MemberStoreRequest;
use App\Http\Requests\Admin\MemberUpdateRequest;
use App\Models\Members;
use App\Repositories\MembersRepository;
use App\Repositories\MemberTypeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class MembersController extends Controller
{
    protected $members, $memberType;

    public function __construct(MembersRepository $members, MemberTypeRepository $memberType)
    {
        $this->members = $members;
        $this->memberType = $memberType;
        auth()->shouldUse('admin');
        $this->upload_path = DIRECTORY_SEPARATOR.'member'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }

    public function index()
    {

        auth()->user()->can('master-policy.perform', ['members', 'view']);
      $members = $this->members->orderBy('display_order', 'asc')->paginate(100);
        return view('admin.member.index')->withMembers($members);
    }

    public function create()
    {
        auth()->user()->can('master-policy.perform', ['members', 'add']);
        $membertypes = $this->memberType->where('is_active','1')->get();

        return view('admin.member.add')->withMembertypes($membertypes);
    }

    public function store(MemberStoreRequest $request)
    {
        auth()->user()->can('master-policy.perform', ['members', 'add']);
        $data = $request->except(['image']);
        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'member/'.$fileName;


        }
        $data['is_active'] = isset($request->is_active) ? 1 : 0;
        if ($this->members->create($data)) {
            return redirect()->route('admin.member.index')
                ->with('flash_notice', 'Members Created Successfully.');
        }
        return redirect()->back()->withInput()
            ->with('flash_notice', 'Members can not be Create.');
    }

    public function edit($id)
    {
        auth()->user()->can('master-policy.perform', ['members', 'edit']);
        $membertypes = $this->memberType->where('is_active','1')->get();

        $member = $this->members->find($id);
        return view('admin.member.edit')->withMembertypes($membertypes)->withMember($member);

    }

    public function update(MemberUpdateRequest $request, $id)
    {
        auth()->user()->can('master-policy.perform', ['members', 'add']);
        $member = $this->members->find($id);
        $data = $request->except(['image', '_token', '_method']);
        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'member/'.$fileName;


        }
        $data['is_active'] = isset($request->is_active) ? 1 : 0;
        if ($this->members->update($member->id, $data)) {
            return redirect()->route('admin.member.index')
                ->with('flash_notice', 'Members Updated Successfully.');
        }
        return redirect()->back()->withInput()
            ->with('flash_notice', 'Members can not be Update.');
    }


    public function destroy(Request $request, $id)
    {
        auth()->user()->can('master-policy.perform', ['members', 'delete']);
        $member = $this->members->find($request->get('id'));
        if ($this->members->destroy($member->id)) {
            $message = 'Member deleted successfully.';
            return response()->json(['status' => 'ok', 'message' => $message], 200);
        }

        return response()->json(['status' => 'error', 'message' => ''], 422);
    }

    public function changeStatus(Request $request)
    {

        auth()->user()->can('master-policy.perform', ['members', 'changeStatus']);
        $member = $this->members->find($request->get('id'));
        if ($member->is_active == 0) {
            $status = 1;
            $message = 'Member with name "' . $member->name . '" is published.';
        } else {
            $status = 0;
            $message = 'Member with name "' . $member->name . '" is unpublished.';
        }

        $this->members->changeStatus($member->id, $status);
        $this->members->update($member->id, ['is_active'=> $status ]);
        $updated = $this->members->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'response' => $updated], 200);
    }
    public function sort(Request $request)
    {
        $exploded = explode('&', str_replace('item[]=', '', $request->order));
        for ($i = 0; $i < count($exploded); $i++) {
            $this->members->update($exploded[$i], ['display_order' => $i]);
        }
        return json_encode(['status' => 'success', 'value' => 'Successfully reordered.'], 200);
    }
}
