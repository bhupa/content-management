<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\AdminEmail;
use App\Mail\UserEmail;
use App\Repositories\ContactRepository;
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

    protected $setting,$content,$contact;

    public function __construct(SettingRepository $setting, ContentRepository $content,ContactRepository $contact)
    {
        $this->setting = $setting;
        $this->content = $content;
        $this->contact = $contact;
    }

    public function index(){
        $setting = $this->setting->where('slug','banner-image')->first();

        return view('contact.index')->withSetting( $setting);
    }
    public function store(ContactRequest $request){
         $data = $request->except('toke');

         if($this->contact->create($data)){
             return redirect()->back()->with('success','Thank You For Messaging Us');
         }

        return redirect()->back()->with('Errors','Message cannot send successfully');


    }
}
