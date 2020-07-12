<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ModuleStoreRequest;
use App\Http\Requests\Admin\ModuleUpdateRequest;
use App\Repositories\ModuleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $module;
    public function __construct(ModuleRepository $module)
    {
        $this->module = $module;
    }

    public function index()
    {
        $modules = $this->module->orderBy('created_at','desc')->paginate(20);
        return view('admin.module.index')->withModules( $modules);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.module.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModuleStoreRequest $request)
    {
        $data = $request->all();
        if($this->module->create($data)){
            return redirect()->route('admin.module.index')
                ->with('flash_notice', 'Module Created Successfully.');
        }

        return redirect()->back()->withInput()
            ->with('flash_notice', 'Module can not be created.');
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
        $module = $this->module->find($id);
        return view('admin.module.edit')->withModule($module);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ModuleUpdateRequest $request, $id)
    {
        $data = $request->all();
        $module = $this->module->find($id);
        if($this->module->update($module->id,$data)){
            return redirect()->route('admin.module.index')
                ->with('flash_notice', 'Module Update Successfully.');
        }

        return redirect()->back()->withInput()
            ->with('flash_notice', 'Module can not be update.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request, $id)
    {



        $request->validate([
            'id' => 'required|exists:modules,id',
        ]);
        $act = $this->module->find($request->get('id'));
        $this->module->destroy($act->id);
        $message = 'Module deleted successfully.';
        return response()->json(['status' => 'ok', 'message' => $message], 200);
    }
}
