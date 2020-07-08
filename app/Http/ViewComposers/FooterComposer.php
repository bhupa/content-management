<?php

namespace App\Http\ViewComposers;

use App\Repositories\ContentRepository;
use App\Repositories\SiteSettingRepository;
use Illuminate\View\View;


class FooterComposer
{
    /**
     * Create a new header composer.
     *
     * @return void
     */
    protected $setting, $content;
    public function __construct(SiteSettingRepository $setting, ContentRepository $content){
        $this->setting =$setting;
        $this->content = $content;
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $settings = $this->setting->where('is_active','1')->orderBy('created_at','desc')->get();
        $view->withSettings($settings)->withViewCount(100);
    }
}