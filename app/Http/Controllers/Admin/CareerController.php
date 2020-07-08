<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CareerStoreRequest;
use App\Http\Requests\Admin\CareerUpdateRequest;
use App\Repositories\CareerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $career,$upload_path;
    public function __construct(CareerRepository $career)
    {

        $this->career = $career;
    }

    public function index()
    {
        $perpage ='100';
        $careers = $this->career->paginate($perpage);
        return view('admin.career.index')->withCareers( $careers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.career.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CareerStoreRequest $request)
    {
        $this->authorize('master-policy.perform', ['career', 'add']);
        $data = $request->except(['_token']);
        $slug = $this->recursive(str_slug($request->position));
       $data['slug'] = $slug;
        $data['is_active'] = isset($data['is_active']) ? 1 : 0;
        if($this->career->create($data)){
            return redirect()->route('admin.careers.index')
                ->with('flash_notice', 'Career Created Successfully.');
        }
        return redirect()->back()->withInput()
            ->with('flash_notice', 'Career can not be created.');
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
        $career = $this->career->find($id);
        return view('admin.career.edit')->withCareer($career);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CareerUpdateRequest $request, $id)
    {


        $this->authorize('master-policy.perform', ['career', 'edit']);
        $career = $this->career->find($id);
        $data = $request->except(['_token']);

        $data['is_active'] = isset($data['is_active']) ? 1 : 0;
        if($this->career->update(  $career->id,$data)){
            return redirect()->route('admin.careers.index')
                ->with('flash_notice', 'Career Updated Successfully.');
        }

        return redirect()->back()->withInput()
            ->with('flash_notice', 'Career can not be Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this->authorize('master-policy.perform', ['career', 'delete']);
        $career = $this->career->find($id);
        if($this->career->destroy($career->id)){
            $message = 'Career deleted successfully.';
            return response()->json(['status' => 'ok', 'message' => $message], 200);

        }

        return response()->json(['status' => 'error', 'message' => ''], 422);
    }

    public function changeStatus(Request $request)
    {
        $this->authorize('master-policy.perform', ['career', 'changeStatus']);
        $career = $this->career->find($request->get('id'));
        if ($career->is_active == 0) {
            $status = 1;
            $message = 'career is published.';
        } else {
            $status = 0;
            $message = 'career is unpublished.';
        }

        $this->career->changeStatus($career->id, $status);
        $this->career->update($career->id, array('is_active' => $status));
        $updated = $this->career->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'response' => $updated], 200);
    }



    public function recursive($data){
        $i = '0';
        if($this->career->where('slug',$data)->exists()){
            $data++;
            return $this->recursive($data);
        }
        else {
            return $data;
        }
    }
}
