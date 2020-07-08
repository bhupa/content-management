<?php

namespace App\Http\Controllers;

use App\Repositories\GalleryVideoRepository;
use Illuminate\Http\Request;

use App\Repositories\GalleryRepository;
use App\Repositories\GalleryImageRepository;
class GalleryController extends Controller
{
    public function __construct(  GalleryRepository $gallery, GalleryImageRepository $galleryImage, GalleryVideoRepository $video)
    {
        $this->gallery = $gallery;
        $this->galleryImage = $galleryImage;
        $this->video = $video;
    }

    public function index(){
        $galleries =$this->gallery->where('is_active','1')->paginate(9);
        return view('gallery.index')->withGalleries($galleries);
    }
    public function show($slug){
        $gallery =$this->gallery->where('slug',$slug)->first();
        $galleryImages = $this->galleryImage->where('gallery_id',$gallery->id)->orderby('created_at','desc')->paginate(9);
       $videos = $this->video->where('gallery_id',$gallery->id)->orderby('created_at','desc')->paginate(9);
        return view('gallery.show')->withGalleryImages($galleryImages)->withVideos($videos)->withGallery($gallery);
    }
}
