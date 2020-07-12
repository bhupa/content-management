<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\Admin\MemberTypeRequest;
use App\Http\Requests\Admin\MemberTypeUpdateRequest;
use App\Repositories\MemberTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberTypeController extends Controller
{
    protected $memberType;

    public function __construct(MemberTypeRepository $memberType)
    {
        $this->memberType = $memberType;
        auth()->shouldUse('admin');
    }

    public function index(){

        auth()->user()->can('master-policy.perform', ['member-type', 'view']);
        $membersType = $this->memberType->orderBy('display_order', 'asc')->paginate('20');
        return view('admin.member-type.index')->withMembersType($membersType);
    }
    public function create(){
        auth()->user()->can('master-policy.perform', ['member-type', 'add']);
        return view('admin.member-type.create');
    }
    public function store(MemberTypeRequest $request){

        auth()->user()->can('master-policy.perform', ['member-type', 'add']);
        $data = $request->except('_token');
        if($this->memberType->create( $data)){
            return redirect()->route('admin.member-type.index')
                ->with('flash_notice', 'Member Created Successfully.');
        }
        return redirect()->back()->withInput()
            ->with('flash_notice', 'Member Type can not be created.');
    }
    public function edit($id){
        auth()->user()->can('master-policy.perform', ['member-type', 'edit']);
        $memberType= $this->memberType->find($id);
        return view('admin.member-type.edit')->withMemberType($memberType);
    }

    public function update(MemberTypeUpdateRequest $request,$id){
        auth()->user()->can('master-policy.perform', ['member-type', 'edit']);
        $memberType= $this->memberType->find($id);
        $data=$request->except(['_token','_method']);
        if($this->memberType->update($memberType->id,     $data)){
            return redirect()->route('admin.member-type.index')
                ->with('flash_notice', 'Member Updated Successfully.');
        }
        return redirect()->back()->withInput()
            ->with('flash_notice', 'Member Type can not be Updated.');
    }
    public function destroy(Request $request, $id)
    {
        auth()->user()->can('master-policy.perform',['member-type','delete']);
        $memberType = $this->memberType->find($id);
        if($this->memberType->destroy($memberType->id)){
            $message = 'Member TYpe deleted successfully.';
            return response()->json(['status' => 'ok', 'message' => $message], 200);
        }

        return response()->json(['status' => 'error', 'message' => ''], 422);
    }

    public function changeStatus(Request $request)
    {
        auth()->user()->can('master-policy.perform', ['member-type', 'changeStatus']);
        $memberType = $this->memberType->find($request->get('id'));
        if ($memberType->is_active == 0) {
            $status = 1;
            $message = 'Member Type is published.';
        } else {
            $status = 0;
            $message = 'Member Type is unpublished.';
        }

        $this->memberType->changeStatus($memberType->id, $status);
        $this->memberType->update($memberType->id, array('updated_by' => auth()->id()));
        $updated = $this->memberType->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'response' => $updated], 200);
    }

}
