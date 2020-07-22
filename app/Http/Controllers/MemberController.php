<?php

namespace App\Http\Controllers;

use App\Repositories\MembersRepository;
use App\Repositories\SettingRepository;
use Illuminate\Http\Request;

class MemberController extends Controller
{

    protected $member,$setting;

    public function __construct(MembersRepository $member,SettingRepository   $setting)
    {
        $this->member = $member;
        $this->setting=  $setting;
    }

    public function index(){
        $setting = $this->setting->where('slug','banner-image')->first();

        $members = $this->member->where('is_active','1')->where('type','Member')->orderBy('display_order','asc')->paginate(9);
        return view('member.index')->withMembers($members)->withSetting($setting);
    }
}
