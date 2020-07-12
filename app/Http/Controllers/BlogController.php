<?php

namespace App\Http\Controllers;

use App\Repositories\BlogRepository;
use App\Repositories\SettingRepository;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    protected $blog,$setting;
    public function __construct(BlogRepository $blog, SettingRepository $setting)
    {

        $this->blog = $blog;
        $this->setting = $setting;
    }


    public function index(){
        $setting = $this->setting->where('slug','banner-image')->first();

        $blogs = $this->blog->where('is_active','1')->orderBy('created_at','desc')->paginate(6);

        return view('blog.index')->withBlogs($blogs)->withSetting($setting );
    }
    public function show($slug){
        $setting = $this->setting->where('slug','banner-image')->first();

        $blog = $this->blog->where('slug',$slug)->first();

        return view('blog.show')->withBlog($blog)->withSetting($setting );
    }
}
