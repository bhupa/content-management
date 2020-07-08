<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\OrganizationStoreRequest;
use App\Http\Requests\Admin\OrganizationUpdateRequest;
use App\Repositories\OrganizationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    protected $organization;
    
    public function __construct(OrganizationRepository $organization)
    {
        $this->organization= $organization;
    }

    public function index()
    {
        $this->authorize('master-policy.perform', ['organization', 'view']);
        $organizations = $this->organization->orderBy('created_at','desc')->paginate('100');
        return view('admin.organization.index')->withOrganizations($organizations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('master-policy.perform', ['organization', 'add']);
        return view('admin.organization.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrganizationStoreRequest $request)
    {
        $this->authorize('master-policy.perform', ['organization', 'add']);
        $data = $request->except(['image']);
        if ($request->get('image')) {
            $saveName = sha1(date('YmdHis') . str_random(3));
            $image = $request->get('image');
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageData = base64_decode($image);
            $data['image'] = 'organization/'. $saveName . '.png';
            Storage::put($data['image'], $imageData);
        }
        $data['is_active'] = isset($data['is_active']) ? 1 : 0;
       
        if($this->organization->create($data)){
            return redirect()->route('admin.organization.index')
                ->with('flash_notice', 'Orgnization Created Successfully.');
        }
        return redirect()->back()->withInput()
            ->with('flash_notice', 'Orgnization can not be created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $this->authorize('master-policy.perform', ['organization', 'edit']);
        $organization = $this->organization->find($id);

        return view('admin.organization.edit')->withOrganization($organization);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrganizationUpdateRequest $request, $id)
    {
        $this->authorize('master-policy.perform', ['organization', 'edit']);
        $organization = $this->organization->find($id);
        $data = $request->except(['image']);
        if ($request->get('image')) {
            $saveName = sha1(date('YmdHis') . str_random(3));
            $image = $request->get('image');
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageData = base64_decode($image);
            $data['image'] = 'organization/'. $saveName . '.png';
            Storage::put($data['image'], $imageData);
        }
        $data['is_active'] = isset($data['is_active']) ? 1 : 0;

        if($this->organization->update($organization->id,$data)){
            return redirect()->route('admin.organization.index')
                ->with('flash_notice', 'Orgnization Updated Successfully.');
        }
        return redirect()->back()->withInput()
            ->with('flash_notice', 'Orgnization can not be updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this->authorize('master-policy.perform', ['organization', 'delete']);
        $organization = $this->organization->find($request->get('id'));
        if($this->organization->destroy($organization->id)){
            $message = 'Organization item deleted successfully.';
            return response()->json(['status' => 'ok', 'message' => $message], 200);
        }
        return response()->json(['status' => 'error', 'message' => ''], 422);
    }

    public function changeStatus(Request $request)
    {
        $this->authorize('master-policy.perform', ['organization', 'changeStatus']);
        $organization= $this->organization->find($request->get('id'));
        if ($organization->is_active == 0) {
            $status = 1;
            $message = 'organization with title "' . $organization->title . '" is published.';
        } else {
            $status = 0;
            $message = 'organization with title "' . $organization->title . '" is unpublished.';
        }

        $this->organization->changeStatus($organization->id, $status);
        $updated = $this->organization->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'response' => $updated], 200);
    }
}
