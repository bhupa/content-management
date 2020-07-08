<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\AdminEmail;
use App\Mail\UserEmail;
use App\Repositories\ContentBannerRepository;
use App\Repositories\ContentRepository;
use Illuminate\Http\Request;
use App\Repositories\SettingRepository;
use Mail;
use Illuminate\Support\Facades\Input;
use Validator;
use Session;

class ContactController extends Controller
{

    protected $setting,$content, $contentbanner;

    public function __construct(SettingRepository $setting, ContentRepository $content,ContentBannerRepository $contentbanner)
    {
        $this->setting = $setting;
        $this->content = $content;
        $this->contentbanner = $contentbanner;
    }

    public function index(){
        $settings = $this->setting->where('is_active', '1')->get();
        $contentbanner = $this->contentbanner->where('title','Contact')->where('is_active', '1')->first();

        return view('contact.index')
                ->withSettings($settings)
                ->withContentbanner($contentbanner );
    }
    public function store(ContactRequest $request){
        $admin = $this->setting->where('name' ,'From Email')->first();
        $companyemail =  $this->setting->where('name' ,'Company Email')->first();
        $companyname =  $this->setting->where('name' ,'Company Name')->first();

        Mail::to($admin->value)->send(new AdminEmail($request,$companyname,$companyemail));
        Mail::to($request->email)->send(new UserEmail($request,$companyname,$companyemail));

        return redirect()->back()->with('success','Thank You For Messaging Us');


    }
}
