<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\GalleryImageRepository;
use App\Repositories\GalleryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Image;

class GalleryImageController extends Controller
{

    protected $hotel;

    protected $image;

    public function __construct(GalleryRepository $gallery, GalleryImageRepository $image)
    {
        $this->gallery = $gallery;
        $this->image = $image;
        auth()->shouldUse('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $this->authorize('master-policy.perform',['gallery','view']);
        $gallery = $this->gallery->find($id);
        $images = $this->image->where('gallery_id', $id)->get();
        return view('admin.gallery.image')->withGallery($gallery)->withImages($images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $this->authorize('master-policy.perform',['gallery','add']);
        $gallery = $this->gallery->find($id);
        return view('admin.gallery.uploadImages')->withGallery($gallery);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->authorize('master-policy.perform',['gallery','add']);
        $data = $request->except(['file']);
        $file = $request->file('file');
        $file_name = time()."_".$file->getClientOriginalName();
            $data['gallery_id'] = $id;
            $data['image'] = 'galleryImages/'. $id. '/' .$file_name;
                Storage::put('galleryImages/'.$id.'/'.$file_name, file_get_contents($file->getRealPath()));

            $this->image->create($data);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $gallery_id, $id)
    {
        $this->authorize('master-policy.perform',['gallery','delete']);
        $galleryImage = $this->image->find($id);
        if($this->image->destroy($galleryImage->id)) {
            if (Storage::exists($galleryImage->image)) {
                Storage::delete($galleryImage->image);
            }
            $message = 'Gallery Album Image deleted successfully.';
            return response()->json(['status' => 'ok', 'message' => $message], 200);
        }
        return response()->json(['status' => 'error', 'message' => ''], 422);
    }
}
