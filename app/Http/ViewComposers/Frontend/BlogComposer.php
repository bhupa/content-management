<?php

namespace App\Http\ViewComposers\Frontend;


use App\Repositories\BannerRepository;
use App\Repositories\BlogRepository;
use App\Repositories\ContentRepository;
use App\Repositories\EventRepository;
use App\Repositories\GalleryRepository;
use App\Repositories\MembersRepository;
use Carbon\Carbon;
use Illuminate\View\View;

class BlogComposer {

    protected $setting,$event,$member,$content,$gallery,$banner;
    public function __construct(
        BlogRepository $blog,
        EventRepository $event,
       MembersRepository $member,
    ContentRepository $content,
    GalleryRepository $gallery,
    BannerRepository $banner

    )
    {
        $this->blog = $blog;
        $this->event = $event;
        $this->member = $member;
        $this->content = $content;
        $this->gallery = $gallery;
        $this->banner = $banner;
    }
    public function compose(view $view){
        $blogs = $this->blog->where('is_active','1')->latest()->take(3)->get();
        $sidebarblogs = $this->blog->where('is_active','1')->latest()->take(4)->get();
        $events = $this->event->where('is_active','1')->latest()->take(4)->get();


        $year = Carbon::now()->format('Y');
        $members = $this->member->where('type','Executive')->whereYear('created_at',$year)->orderBy('display_order','asc')->take(3)->get();

        $contents = $this->content->where('is_active','1')->where('display_in','content')->get();

        $about = $this->content->where('slug','about-us')->first();

        $galleries = $this->gallery->where('is_active','1')->latest()->take(8)->get();
        $banners = $this->banner->where('is_active','1')->latest()->take(4)->get();

        $view->withBanners($banners)->withGalleries($galleries)->withAbout($about)->withBlogs($blogs)->withEvents($events)->withSidebarblogs($sidebarblogs)->withMembers($members)->withContents($contents);

    }
}