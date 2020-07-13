<?php

namespace App\Http\Controllers;

use App\Models\Members;
use App\Repositories\MembersRepository;
use App\Repositories\SettingRepository;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;


class TeamController extends Controller
{

    protected $member,$setting;

    public function __construct(MembersRepository $member,SettingRepository $setting)
    {
        $this->member = $member;
        $this->setting= $setting;
    }


    public function index(){

        $year = Carbon::now()->format('Y');
        $executives = $this->member->where('type','Executive')->whereYear('created_at',$year)->orderBy('display_order','asc')->get();

        $members = $this->member->where('type','Member')->orderBy('display_order','asc')->get();
        $setting = $this->setting->where('slug','banner-image')->first();

        $usersUnique = Members::select(DB::raw('count(id) as `created_at`'), DB::raw("DATE_FORMAT(created_at, '%Y') new_date"),  DB::raw('YEAR(created_at) year, MONTH(created_at) year'))
            ->groupby('created_at','year')
            ->where('is_active','1')
            ->orderBy('new_date','desc')
            ->get();


        $teamList = $usersUnique->unique('new_date');

        return view('team.index')->withExecutives($executives)->withMembers($members)->withSetting($setting)->withTeamList($teamList);
    }
    public  function list(Request $request){

        $executives = $this->member->where('type','Executive')->whereYear('created_at',$request->date)->orderBy('display_order','asc')->get();


        return view('team.show')->withExecutives($executives);
    }
}
