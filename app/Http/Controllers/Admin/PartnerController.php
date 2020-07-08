<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\OurPartnerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $partner;
    public function __construct(OurPartnerRepository $partner)
    {
        $this->partner=$partner;
    }

    public function index()
    {
        $perpage ='100';
        $partners= $this->partner->paginate($perpage);
        return view('admin.partner.index')->withPartners($partners);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('master-policy.perform', ['partner', 'add']);
        $data = $request->except(['image']);

        if($request->get('image')){
            $saveName = sha1(date('YmdHis') . str_random(3));
            $image = $request->get('image');
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageData = base64_decode($image);
            $data['image'] = 'partner/'. $saveName . '.png';

            Storage::put($data['image'], $imageData);
        }
        $data['is_active'] = isset($data['is_active']) ? 1 : 0;

        if($this->partner->create($data)){
            return redirect()->route('admin.partner.index')
                ->with('flash_notice', 'Partner Created Successfully.');
        }

        return redirect()->back()->withInput()
            ->with('flash_notice', 'Partner can not be created.');
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
        $partner = $this->partner->find($id);
        return view('admin.partner.edit')->withPartner($partner);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('master-policy.perform', ['partner', 'edit']);
        $partner = $this->partner->find($id) ;
        $data = $request->except(['image']);

        if($request->get('image')){
            $saveName = sha1(date('YmdHis') . str_random(3));
            $image = $request->get('image');
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageData = base64_decode($image);
            $data['image'] = 'partner/'. $saveName . '.png';

            Storage::put($data['image'], $imageData);
        }
        $data['is_active'] = isset($data['is_active']) ? 1 : 0;

        if($this->partner->update($partner->id,$data)){
            return redirect()->route('admin.partner.index')
                ->with('flash_notice', 'Partner Update Successfully.');
        }

        return redirect()->back()->withInput()
            ->with('flash_notice', 'Partner can not be Update.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this->authorize('master-policy.perform', ['partner', 'delete']);
        $partner = $this->partner->find($request->id);
        if($this->partner->destroy($partner->id)){
            $message = 'Partner deleted successfully.';
            return response()->json(['status' => 'ok', 'message' => $message], 200);
        }
        return response()->json(['status' => 'error', 'message' => ''], 422);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function changeStatus(Request $request)
    {
        $this->authorize('master-policy.perform', ['partner', 'changeStatus']);
        $partner = $this->partner->find($request->get('id'));
        if ($partner->is_active == 0) {
            $status = 1;
            $message = 'Partner is published.';
        } else {
            $status = 0;
            $message = 'Partner is unpublished.';
        }

        $this->partner->changeStatus($partner->id, $status);
        $updated = $this->partner->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'response' => $updated], 200);
    }

}
