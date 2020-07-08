<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ServiceCategoryStoreRequest;
use App\Http\Requests\Admin\ServiceCategoryUpdateRequest;
use App\Repositories\SeriveCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceCategoryController extends Controller
{
    protected $servicecategory;
    public function __construct(SeriveCategoryRepository $servicecategory)
    {
        $this->servicecategory =$servicecategory;
    }

    public function index()
    {
        $services = $this->servicecategory->orderBy('created_at','desc')->paginate('20');
        return view('admin.servicecategory.index')->withServices($services);
    }
    public function create(){
        return view('admin.servicecategory.create');
    }
    public function store(ServiceCategoryStoreRequest $request){
        $data = $request->except(['_token']);
        $data['is_active'] = isset($data['is_active']) ? 1 : 0;
        if($this->servicecategory->create($data)){
            return redirect()->route('admin.service-categories.index')
                ->with('flash_notice', 'ServiceCategory Created Successfully.');
        }
        return redirect()->back()->withInput()
            ->with('flash_notice', 'ServiceCategory can not be created.');
    }
    public function edit($id){
        $servicecategory = $this->servicecategory->find($id);
        return view('admin.servicecategory.edit')->withServicecategory( $servicecategory);
    }
    public function update(ServiceCategoryUpdateRequest $request, $id)
    {
        $service =$this->servicecategory->find($id);
        $data = $request->except(['_token']);

        $data['is_active'] = isset($data['is_active']) ? 1 : 0;
        if($this->servicecategory->update($service->id,$data)){
            return redirect()->route('admin.service-categories.index')
                ->with('flash_notice', 'ServiceCategory updated Successfully.');
        }
        return redirect()->back()->withInput()
            ->with('flash_notice', 'ServiceCategory can not be updated.');
    }
    public function destroy(Request $request,$id){
        $service = $this->servicecategory->findOrfail($id);
        if($this->servicecategory->destroy($service->id)){
            $message = 'ServiceCategory deleted successfully.';
            return response()->json(['status' => 'ok', 'message' => $message], 200);
        }
        return response()->json(['status' => 'error', 'message' => ''], 422);
    }
    public function changeStatus(Request $request){
        $service = $this->servicecategory->find($request->get('id'));
        if ($service->is_active == 0) {
            $service->is_active = '1';
            $message = 'ServiceCategory with title "' . $service->title . '" is published.';
        } else {
            $service->is_active = '0';
            $message = 'ServiceCategory with title "' . $service->title . '" is unpublished.';
        }
        $this->servicecategory->update($service->id,['is_active' => $service->is_active]);
        $updated = $this->servicecategory->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'response' => $updated], 200);
    }
}
