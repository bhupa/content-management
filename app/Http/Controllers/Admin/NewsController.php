<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\NewsRequest;
use App\Http\Requests\Admin\NewsUpdateRequest;
use App\Repositories\NewsRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{

    public $title = 'News';

    protected $news;

    public function __construct(NewsRepository $news){
        $this->news = $news;
        auth()->shouldUse('admin');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('master-policy.perform', ['news', 'view']);
        $title = $this->title;
        $news = $this->news->orderBy('display_order', 'asc')->paginate('100');
        return view('admin.news.index')->withTitle($title)->withNews($news);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('master-policy.perform', ['news', 'add']);
        $title = 'Add News';
        return view('admin.news.create')->withTitle($title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        $this->authorize('master-policy.perform', ['news', 'add']);
        $data = $request->except(['image']);
        if($request->get('image')){
            $saveName=sha1(date('YmdHis').str_random(3));
            $image = $request->get('image');
            $image = str_replace('data:image/png;base64','',$image);
            $image = str_replace('','+', $image);
            $imageData = base64_decode(   $image);
            $data['image'] = 'news/'.$saveName.'png';
            Storage::put($data['image'],   $imageData);

        }
        $data['is_active'] = isset($request->is_active) ? 1:0;
        $data['created_by'] = Auth::user()->id;
        $data['slug'] =str_slug($request->title);
        $data['meta_title']= $request->meta_title;
        $data['keywords']= $request->keywords;
        if($this->news->create($data)){
            return redirect()->route('admin.news.index')
                ->with('flash_notice', 'News Created Successfully.');
        }
        return redirect()->back()->withInput()
            ->with('flash_notice', 'News can not be Create.');
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
        $this->authorize('master-policy.perform', ['news', 'edit']);
        $title = 'Edit News';
        $news = $this->news->find($id);
        return view('admin.news.edit')->withTitle($title)->withNews($news);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsUpdateRequest $request, $id)
    {
        $this->authorize('master-policy.perform', ['news', 'edit']);
        $new = $this->news->find($id);
        $data = $request->except(['image']);
        if($request->get('image')){
            $saveName=sha1(date('YmdHis').str_random(3));
            $image = $request->get('image');
            $image = str_replace('data:image/png;base64','',$image);
            $image = str_replace('','+', $image);
            $imageData = base64_decode(   $image);
            $data['image'] = 'news/'.$saveName.'png';
            Storage::put($data['image'],   $imageData);
            if(Storage::exists($new->image)){
               Storage::delete($new->image);
            }

        }
        $data['is_active'] = isset($request->is_active) ? 1:0;
        $data['updated_by'] = Auth::user()->id;
        $data['slug'] =str_slug($request->title);
        $data['meta_title']= $request->meta_title;
        $data['keywords']= $request->keywords;
        if($this->news->update($id, $data)){
            return redirect()->route('admin.news.index')
                ->with('flash_notice', 'News Updated Successfully.');
        }

        return redirect()->back()->withInput()
            ->with('flash_notice', 'News can not be Updated ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this->authorize('master-policy.perform', ['news', 'delete']);
        $news = $this->news->find($request->get('id'));
        $this->news->update($news->id, array('deleted_by' => Auth::user()->id));
        if($this->news->destroy($news->id)){
            $message = 'News item deleted successfully.';
            return response()->json(['status' => 'ok', 'message' => $message], 200);
        }
        return response()->json(['status' => 'error', 'message' => ''], 422);
    }

    public function changeStatus(Request $request)
    {
        $this->authorize('master-policy.perform', ['news', 'changeStatus']);
        $news = $this->news->find($request->get('id'));
        if ($news->is_active == 0) {
            $status = 1;
            $message = 'News with title "' . $news->title . '" is published.';
        } else {
            $status = 0;
            $message = 'News with title "' . $news->title . '" is unpublished.';
        }

        $this->news->changeStatus($news->id, $status);
        $this->news->update($news->id, array('updated_by' => Auth::user()->id));
        $updated = $this->news->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'response' => $updated], 200);
    }

    public function sort(Request $request){
        $exploded = explode('&', str_replace('item[]=', '', $request->order));
        for ($i=0; $i < count($exploded) ; $i++) {
            $this->news->update($exploded[$i], ['display_order' => $i]);
        }
        return json_encode(['status' => 'success', 'value' => 'Successfully reordered.'], 200);
    }
}
