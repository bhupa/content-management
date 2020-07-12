<?php

namespace App\Http\Controllers;

use App\Repositories\GalleryVideoRepository;
use App\Repositories\SettingRepository;
use Illuminate\Http\Request;

use App\Repositories\GalleryRepository;
use App\Repositories\GalleryImageRepository;
class GalleryController extends Controller
{
    protected $setting;
    public function __construct(  GalleryRepository $gallery, GalleryImageRepository $galleryImage,SettingRepository $setting)
    {
        $this->gallery = $gallery;
        $this->galleryImage = $galleryImage;
        $this->setting = $setting;
    }

    public function index(){
        $setting = $this->setting->where('slug','banner-image')->first();
        $galleries =$this->gallery->where('is_active','1')->paginate(9);

        return view('gallery.index')->withGalleries($galleries)->withSetting($setting);
    }
    public function show($slug){
        $gallery =$this->gallery->where('slug',$slug)->first();
        $galleryImages = $this->galleryImage->where('gallery_id',$gallery->id)->orderby('created_at','desc')->paginate(9);
        $setting = $this->setting->where('slug','banner-image')->first();

        return view('gallery.show')->withGalleryImages($galleryImages)->withSetting($setting)->withGallery($gallery);
    }
}
