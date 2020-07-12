<?php

namespace App\Http\ViewComposers\Frontend;


use App\Repositories\SettingRepository;
use Illuminate\View\View;

class SettingComposer {

    protected $setting;
    public function __construct(
      SettingRepository $setting

    )
    {
        $this->setting = $setting;
    }
    public function compose(view $view){
        $setting = $this->setting->where('is_active','1')->get();


        $view->withSetting($setting);

    }
}