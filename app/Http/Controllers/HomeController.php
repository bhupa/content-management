<?php

namespace App\Http\Controllers;



use App\Repositories\BannerRepository;
use App\Repositories\ContentBannerRepository;
use App\Repositories\ContentRepository;
use App\Repositories\GalleryRepository;
use App\Repositories\RoomlistRepository;
use App\Repositories\TestimonialsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;

use Session;
use Carbon\Carbon;
use App\Classes\Sms;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


        protected $gallery, $testimonial, $banner, $content;

    public  function __construct(
                                 GalleryRepository $gallery,
                                 TestimonialsRepository $testimonial,
            BannerRepository $banner,
            ContentRepository $content

    )
    {
      $this->gallery = $gallery;
      $this->testimonial = $testimonial;
      $this->banner = $banner;
      $this->content =$content;

    }

    public function index()
    {
//        $content = $this->content->where('title','About Us')->first();
//        $banners = $this->banner->where('is_active','1')->orderBy('display_order','desc')->latest()->take(6)->get();
//        $roomlists = $this->roomlist->where('is_active','1')->orderBy('display_order','asc')->get();
//         $galleries = $this->gallery->where('is_active','1')->orderBy('display_order','desc')->latest()->take(8)->get();
//        $testimonials = $this->testimonial->where('is_active','1')->orderBy('display_order','desc')->get();
//         return view('frontend.home')
//            ->withRoomlists($roomlists)
//            ->withGalleries($galleries)
//             ->withTestimonials($testimonials)
//             ->withBanners($banners)
//             ->withContent($content);

        return view('frontend.home');

    }



}
