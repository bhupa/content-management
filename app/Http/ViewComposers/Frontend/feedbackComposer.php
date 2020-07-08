<?php

namespace App\Http\ViewComposers\Frontend;

use App\Repositories\BannerRepository;
use App\Repositories\ContentRepository;
use App\Repositories\SiteSettingRepository;
use Illuminate\View\View;

class feedbackComposer {

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
        $phone = $this->setting->where('is_active', '1')->where('name','Phone')->first();
        $email = $this->setting->where('is_active', '1')->where('name','Company Email')->first();
        $address = $this->setting->where('is_active', '1')->where('name','Address')->first();
        $view->withPhone($phone)
            ->withEmail($email)
            ->withAddress($address);
    }
}