<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\GalleryStoreRequest;
use App\Repositories\GalleryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public $title = 'Gallery';

    protected $gallery;

    public function __construct(GalleryRepository $gallery){
        $this->gallery = $gallery;
        auth()->shouldUse('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('master-policy.perform',['gallery','view']);
        $title = $this->title;
        $galleries = $this->gallery->orderBy('created_at', 'desc')->paginate('20');
        return view('admin.gallery.index')->withGalleries($galleries)->withTitle($title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('master-policy.perform',['gallery','add']);
        $title = 'Add Gallery';
        return view('admin.gallery.create')->withTitle($title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryStoreRequest $request)
    {
        $data = $request->except(['image']);
        if($request->get('image')){
            $saveName=sha1(date('YmdHis').str_random(3));
            $image = $request->get('image');
            $image = str_replace('data:image/png;base64','',$image);
            $image = str_replace('','+', $image);
            $imageData = base64_decode(   $image);
            $data['image'] = 'gallery/'.$saveName.'png';
            Storage::put($data['image'],   $imageData);

        }
        $data['is_active'] = isset($request->is_active) ? 1:0;
        $data['created_by'] = Auth::user()->id;
        if($this->gallery->create($data)){
            return redirect()->route('admin.gallery.index')
                ->with('flash_notice', 'Gallery Created Successfully.');
        }
        return redirect()->back()->withInput()
            ->with('flash_notice', 'Gallery can not be Create.');
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
        $this->authorize('master-policy.perform',['gallery','edit']);
        $title = 'Edit Gallery';
        $gallery = $this->gallery->find($id);
        return view('admin.gallery.edit')->withGallery($gallery)->withTitle($title);
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
        $this->authorize('master-policy.perform',['gallery','edit']);
        $gallery = $this->gallery->find($id);
        $data= $request->except(['image']);
        if($request->get('image')){
            $saveName = sha1(date('YmdHis').str_random(3));
            $image = $request->get('image');
            $image = str_replace('data:image/png;base64','',$image);
            $image = str_replace('','+', $image);
            $imageData =base64_decode($image);
            $data['image']= 'gallery/'.$saveName.'png';
            Storage::put($data['image'], $imageData);
            if(Storage::exists($gallery->image)){
                Storage::delete($gallery->image);
            }

        }

        $data['is_active'] = isset($data['is_active']) ? 1 : 0;
        $data['updated_by'] = Auth::user()->id;
        if($this->gallery->update($gallery->id, $data)){
            return redirect()->route('admin.gallery.index')
                ->with('flash_notice', 'Gallery Updated Successfully.');
        };

        return redirect()->back()->withInput()
            ->with('flash_notice', 'Gallery Can not be Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this->authorize('master-policy.perform',['gallery','delete']);
        $gallery = $this->gallery->find($request->get('id'));
        if($this->gallery->destroy($gallery->id)){
            $message = 'Gallery deleted successfully.';
            return response()->json(['status' => 'ok', 'message' => $message], 200);
        }

        return response()->json(['status' => 'error', 'message' => ''], 422);
    }

    public function changeStatus(Request $request)
    {
        $this->authorize('master-policy.perform',['gallery','changeStatus']);
        $gallery = $this->gallery->find($request->get('id'));
        if ($gallery->is_active == 0) {
            $status = 1;
            $message = 'Gallery with title "' . $gallery->title . '" is published.';
        } else {
            $status = 0;
            $message = 'Gallery with title "' . $gallery->title . '" is unpublished.';
        }

        $this->gallery->changeStatus($gallery->id, $status);
        $this->gallery->update($gallery->id, array('updated_by' => Auth::user()->id));
        $updated = $this->gallery->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'response' => $updated], 200);
    }

    public function sort(Request $request){

        dd($request->order);
        $exploded = explode('&', str_replace('item[]=', '', $request->order));
        for ($i=0; $i < count($exploded) ; $i++) {
            $this->gallery->update($exploded[$i], ['display_order' => $i]);
        }
        return json_encode(['status' => 'success', 'value' => 'Successfully reordered.'], 200);
    }
}
