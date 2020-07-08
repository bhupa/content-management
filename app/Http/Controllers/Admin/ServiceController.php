<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ServiceStoreRequest;
use App\Http\Requests\Admin\ServiceUpdateRequest;
use App\Repositories\ServicesRepository;
use App\Repositories\SeriveCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $service,$servicecategory;
    public function __construct(ServicesRepository $service, SeriveCategoryRepository $servicecategory)
    {
        $this->service =$service;
        $this->servicecategory = $servicecategory;
    }

    public function index()
    {
        $services = $this->service->orderBy('created_at','desc')->paginate('20');
        return view('admin.service.index')->withServices($services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = $this->servicecategory->where('is_active','1')->get();

        return view('admin.service.create')
            ->withCategorys($categorys);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceStoreRequest $request)
    {
        $data = $request->except(['image']);
        if ($request->get('image')) {
            $saveName = sha1(date('YmdHis') . str_random(3));
            $image = $request->get('image');
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageData = base64_decode($image);
            $data['image'] = 'service/'. $saveName . '.png';
            Storage::put($data['image'], $imageData);
        }
        if ($request->get('icon_image')) {
            $saveName = sha1(date('YmdHis') . str_random(3));
            $image = $request->get('icon_image');
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageData = base64_decode($image);
            $data['icon_image'] = 'service/'. $saveName . '.png';
            Storage::put($data['icon_image'], $imageData);
        }
        $data['is_active'] = isset($data['is_active']) ? 1 : 0;
        if($this->service->create($data)){
            return redirect()->route('admin.service.index')
                ->with('flash_notice', 'Service Created Successfully.');
        }
        return redirect()->back()->withInput()
            ->with('flash_notice', 'Service can not be created.');
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
        $service = $this->service->find($id);
        $categorys = $this->servicecategory->where('is_active','1')->get();

        return view('admin.service.edit')->withService($service)
            ->withCategorys($categorys);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceUpdateRequest $request, $id)
    {
        $service =$this->service->find($id);
        $data = $request->except(['image','icon_image']);
        if ($request->get('image')) {
            $saveName = sha1(date('YmdHis') . str_random(3));
            $image = $request->get('image');
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageData = base64_decode($image);
            $data['image'] = 'service/'. $saveName . '.png';
            Storage::put($data['image'], $imageData);
        }
        if ($request->get('icon_image')) {
            $saveName = sha1(date('YmdHis') . str_random(3));
            $image = $request->get('icon_image');
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageData = base64_decode($image);
            $data['icon_image'] = 'service/'. $saveName . '.png';
            Storage::put($data['icon_image'], $imageData);
        }
        $data['is_active'] = isset($data['is_active']) ? 1 : 0;
        if($this->service->update($service->id,$data)){
            return redirect()->route('admin.service.index')
                ->with('flash_notice', 'Service updated Successfully.');
        }
        return redirect()->back()->withInput()
            ->with('flash_notice', 'Service can not be updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id){
        $service = $this->service->findOrfail($id);
        if($this->service->destroy($service->id)){
            $message = 'Service deleted successfully.';
            return response()->json(['status' => 'ok', 'message' => $message], 200);
        }
        return response()->json(['status' => 'error', 'message' => ''], 422);
    }
    public function changeStatus(Request $request){
        $service = $this->service->find($request->get('id'));
        if ($service->is_active == 0) {
            $service->is_active = '1';
            $message = 'Service with title "' . $service->title . '" is published.';
        } else {
            $service->is_active = '0';
            $message = 'Service with title "' . $service->title . '" is unpublished.';
        }
        $this->service->update($service->id,['is_active' => $service->is_active]);
        $updated = $this->service->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'response' => $updated], 200);
    }
}
