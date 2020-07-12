<?php

namespace App\Http\ViewComposers\Frontend;

use App\Repositories\ActivityRepository;
use App\Repositories\BannerRepository;
use App\Repositories\ContentRepository;
use App\Repositories\OrganizationRepository;
use App\Repositories\OurPartnerRepository;
use App\Repositories\SeriveCategoryRepository;
use App\Repositories\SiteSettingRepository;
use Illuminate\View\View;

class AppComposer {

    protected $content,$banner,$setting;
    public function __construct(
       ContentRepository $content,
    BannerRepository $banner,
    SiteSettingRepository  $setting

      )
    {
        $this->content = $content;
        $this->banner = $banner;
        $this->setting = $setting;
    }
    public function compose(view $view){

       $settings = $this->setting->where('is_active','1')->get();
        $about = $this->content->where('slug','about-us')->first();
        $footermenu = $this->content->where('is_active','1')->where('display_in','footer')->get();


        $view->withSettings($settings)->withAbout($about)->withFootermenu($footermenu);
    }
}