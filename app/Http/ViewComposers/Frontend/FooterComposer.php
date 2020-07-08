<?php

namespace App\Http\ViewComposers\Frontend;

use App\Repositories\ContentRepository;
use App\Repositories\NewsRepository;
use App\Repositories\ProgramRepository;
use App\Repositories\SettingRepository;
use Illuminate\View\View;

class FooterComposer {

    protected $news,$content,$setting;
    public function __construct(
        NewsRepository  $news,
    ContentRepository $content,
    SettingRepository $setting
    )
    {
        $this->news = $news;
        $this->content = $content;
        $this->setting = $setting;
    }
    public function compose(view $view){
        $news = $news = $this->news->where('is_active', '1')->orderBy('created_at', 'desc')->take(2)->get();
        $settings = $this->setting->where('is_active', '1')->orderBy('created_at','desc')->get();
        $contents = $this->content->where('is_active', '1')->where('header','1')->get();
        $latestcontents = $this->content->where('is_active','1')->where('footer','1')->latest()->take(5)->get();

        $contentmenus = $this->content->where('is_active', '1')->where('footer','1')->latest()->take(10)->skip(5)->get();
        $about = $this->content->where('title','About Us')->first();

        $view->withNews( $news)
            ->withContents($contents)
                ->withContentmenus($contentmenus)
                ->withSettings($settings)
            ->withLatestcontents($latestcontents)
        ->withAbout($about);
    }
}