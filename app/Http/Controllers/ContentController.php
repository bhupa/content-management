<?php

namespace App\Http\Controllers;

use App\Repositories\ContentBannerRepository;
use App\Repositories\ContentRepository;
use App\Repositories\RoomlistRepository;
use App\Repositories\ServicesRepository;
use App\Repositories\SettingRepository;
use Illuminate\Http\Request;
use App\Repositories\NewsRepository;

class ContentController extends Controller
{

    protected $content, $setting;
	
    public function __construct( ContentRepository $content, SettingRepository $setting
                                 )
    {
        $this->content = $content;
        $this->setting = $setting;
    }

    public function show($slug){

        $setting = $this->setting->where('slug','banner-image')->first();

        $content = $this->content->where('is_active','1')->where('slug', $slug)->first();
        if(empty($content)){
            abort(404);
        }
        return view('content.show')
        ->withContent( $content)->withSetting($setting);
    }
    public function about(){
        $about = $this->content->where('title','About')->where('is_active','1')->first();
        $services = $this->service->where('is_active','1')->latest()->take(6)->get();

        return view('frontend.about')
            ->withServices($services)
            ->withAbout($about);
    }

}
