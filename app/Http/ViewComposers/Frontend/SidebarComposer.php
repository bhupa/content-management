<?php

namespace App\Http\ViewComposers\Frontend;

use App\Repositories\ContentRepository;
use App\Repositories\GalleryRepository;
use App\Repositories\NewsRepository;
use App\Repositories\SettingRepository;
use Illuminate\View\View;

class SidebarComposer {

    protected $news, $gallery;
    public function __construct(
        NewsRepository  $news,
    GalleryRepository $gallery

    )
    {
        $this->news = $news;
        $this->gallery = $gallery;

    }
    public function compose(view $view){
        $news = $this->news->where('is_active','1')->where('type','1')->latest()->take(4)->get();
        $galleries = $this->gallery->where('is_active','1')->latest()->take(6)->get();
        
        $view->withNews($news)->withGalleries($galleries);

    }
}