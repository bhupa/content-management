<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ProjectStoreRequest;
use App\Http\Requests\Admin\ProjectUpdateRequest;
use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $project;
    public function __construct(ProjectRepository $project)
    {
        $this->project =$project;
    }

    public function index()
    {
        $projects = $this->project->orderBy('created_at','desc')->paginate('20');

        return view('admin.project.index')->withProjects($projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectStoreRequest $request)
    {
        $data = $request->except(['image']);
        if ($request->get('image')) {
            $saveName = sha1(date('YmdHis') . str_random(3));
            $image = $request->get('image');
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageData = base64_decode($image);
            $data['image'] = 'project/'. $saveName . '.png';
            Storage::put($data['image'], $imageData);
        }
        $data['is_active'] = isset($data['is_active']) ? 1 : 0;
        if($this->project->create($data)){
            return redirect()->route('admin.project.index')
                ->with('flash_notice', 'Project Created Successfully.');
        }
        return redirect()->back()->withInput()
            ->with('flash_notice', 'Project can not be created.');
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
        $project = $this->project->find($id);
        return view('admin.project.edit')->withProject($project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectUpdateRequest $request, $id)
    {
        $project = $this->project->find($id);
        $data = $request->except(['image']);
        if ($request->get('image')) {
            $saveName = sha1(date('YmdHis') . str_random(3));
            $image = $request->get('image');
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageData = base64_decode($image);
            $data['image'] = 'project/'. $saveName . '.png';
            Storage::put($data['image'], $imageData);
        }
        $data['is_active'] = isset($data['is_active']) ? 1 : 0;
        if($this->project->update($project->id,$data)){
            return redirect()->route('admin.project.index')
                ->with('flash_notice', 'Project Updated Successfully.');
        }
        return redirect()->back()->withInput()
            ->with('flash_notice', 'Project can not be Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id){
        $project = $this->project->findOrfail($id);
        if($this->project->destroy($project->id)){
            $message = 'Project deleted successfully.';
            return response()->json(['status' => 'ok', 'message' => $message], 200);
        }
        return response()->json(['status' => 'error', 'message' => ''], 422);
    }
    public function changeStatus(Request $request){
        $project = $this->project->find($request->get('id'));
        if ($project->is_active == 0) {
            $project->is_active = '1';
            $message = 'Project with title "' . $project->title . '" is published.';
        } else {
            $project->is_active = '0';
            $message = 'Project with title "' . $project->title . '" is unpublished.';
        }
        $this->project->update($project->id,['is_active' => $project->is_active]);
        $updated = $this->project->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'response' => $updated], 200);
    }
}
