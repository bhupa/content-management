<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ContentRequest;
use App\Http\Requests\Admin\ContentUpdateRequest;
use App\Repositories\ContentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{

    public $title = 'Content';

    protected $content;

    public function __construct(
        ContentRepository $content
    ){
        $this->content = $content;
        auth()->shouldUse('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return mixed
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('master-policy.perform', ['content', 'view']);
        $title = $this->title;
        $contents = $this->content->orderBy('created_at', 'desc')->paginate('20');
        return view('admin.content.index')
            ->withContents($contents)
            ->withTitle($title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('master-policy.perform', ['content', 'add']);
        $title = 'Add Content';
        $parents = $this->content->whereNull('parent_id')->orderBy('display_order','asc')->where('footer','0')->where('edit','0')->get();
        return view('admin.content.create')
            ->withParents($parents)
            ->withTitle($title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(ContentRequest $request)
    {
        $this->authorize('master-policy.perform', ['content', 'add']);
        $data = $request->except(['image']);
        if ($request->get('image')) {
            $saveName = sha1(date('YmdHis') . str_random(3));
            $image = $request->get('image');
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageData = base64_decode($image);
            $data['image'] = 'content/'. $saveName . '.png';
            Storage::put($data['image'], $imageData);
        }
        $data['is_active'] = isset($data['is_active']) ? 1 : 0;
        $data['edit'] = isset($data['edit']) ? 1 : 0;
        $data['header'] = isset($data['header']) ? 1 : 0;
        $data['footer'] = isset($data['footer']) ? 1 : 0;
        $data['created_by'] = auth()->id();
        if($this->content->create($data)){
            return redirect()->route('admin.contents.index')
                ->with('flash_notice', 'Content Created Successfully.');
        }
        return redirect()->back()->withInput()
            ->with('flash_notice', 'Content can not be created.');
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
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit($id)
    {
        $this->authorize('master-policy.perform', ['content', 'edit']);
        $title = 'Edit Content';
        $content = $this->content->find($id);
//        $parents = $this->content->where('id', '!=', $id)->orwhereHas('child', function($query) use($id){
//
//        })->get();
        $patenr= $this->content->where('footer','0')->where('edit','0')->where('id', '!=', $id)->with('allchild')->whereNull('parent_id')->get();
        $parents =  $patenr->where('parent_id', '!=', $id)->all();

        return view('admin.content.edit')
            ->withContent($content)
            ->withParents($parents)
            ->withTitle($title);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(ContentUpdateRequest $request, $id)
    {

        $this->authorize('master-policy.perform', ['content', 'edit']);
        $content = $this->content->find($id);
        $data = $request->except(['image']);
        if ($request->get('image')) {
            $saveName = sha1(date('YmdHis') . str_random(3));
            $image = $request->get('image');
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageData = base64_decode($image);
            $data['image'] = 'content/'. $saveName . '.png';
            Storage::put($data['image'], $imageData);
            if(Storage::exists($content->image)){
                Storage::delete($content->image);
            }
        }

        $data['is_active'] = isset($request['is_active']) ? 1 : 0;
        $data['edit'] = isset($request['edit']) ? 1 : 0;
        $data['header'] = isset($data['header']) ? 1 : 0;
        $data['footer'] = isset($data['footer']) ? 1 : 0;

        $data['updated_by'] = auth()->id();
        if($this->content->update($content->id, $data)){
            return redirect()->route('admin.contents.index')
                ->with('flash_notice', 'Content Updated Successfully.');
        }
        return redirect()->back()->withInput()
            ->with('flash_notice', 'Content can not be updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Request $request, $id)
    {
        $this->authorize('master-policy.perform', ['content', 'delete']);
        $content = $this->content->find($id);
        if($this->content->destroy($content->id)){
            $message = 'Content deleted successfully.';
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
        $this->authorize('master-policy.perform', ['content', 'changeStatus']);
        $content = $this->content->find($request->get('id'));
        if ($content->is_active == 0) {
            $status = 1;
            $message = 'Content is published.';
        } else {
            $status = 0;
            $message = 'Content is unpublished.';
        }

        $this->content->changeStatus($content->id, $status);
        $this->content->update($content->id, array('updated_by' => auth()->id()));
        $updated = $this->content->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'response' => $updated], 200);
    }

      public function sort(Request $request)
    {
        $exploded = explode('&', str_replace('item[]=', '', $request->order));
        for ($i = 0; $i < count($exploded); $i++) {
            $this->content->update($exploded[$i], ['display_order' => $i]);
        }
        return json_encode(['status' => 'success', 'value' => 'Successfully reordered.'], 200);
    }
}
