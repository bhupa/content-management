<?php

namespace App\Http\Controllers;

use App\Repositories\BannerRepository;
use App\Repositories\SettingRepository;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    protected  $banner,$setting;

    public function __construct(BannerRepository $banner, SettingRepository $setting)
    {

        $this->setting = $setting;
        $this->banner = $banner;
    }

    public function show($slug){
        $setting = $this->setting->where('slug','banner-image')->first();
        $banner = $this->banner->where('slug',$slug)->first();

        return view('banner.show')->withSetting($setting)->withBanner($banner);

    }

}
