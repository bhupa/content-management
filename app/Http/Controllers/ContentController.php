<?php

namespace App\Http\Controllers;

use App\Repositories\ContentBannerRepository;
use App\Repositories\ContentRepository;
use App\Repositories\RoomlistRepository;
use App\Repositories\ServicesRepository;
use Illuminate\Http\Request;
use App\Repositories\NewsRepository;

class ContentController extends Controller
{

    protected $content, $contentbanner, $roomlist;
	
    public function __construct( ContentRepository $content, ContentBannerRepository $contentbanner, RoomlistRepository $roomlist
                                 )
    {
        $this->content = $content;
        $this->contentbanner = $contentbanner;
        $this->roomlist = $roomlist;
    }

    public function show($slug){
        $roomlists =$this->roomlist->where('is_active', '1')->get();
        $contentbanner = $this->contentbanner->where('title','Content')->where('is_active', '1')->first();

        $content = $this->content->where('is_active','1')->where('slug', $slug)->first();
        if(empty($content)){
            abort(404);
        }
        return view('content.show')
        ->withContent( $content)->withContentbanner ($contentbanner )->withRoomlists($roomlists);
    }
    public function about(){
        $about = $this->content->where('title','About')->where('is_active','1')->first();
        $services = $this->service->where('is_active','1')->latest()->take(6)->get();

        return view('frontend.about')
            ->withServices($services)
            ->withAbout($about);
    }

}
