<?php

namespace App\Http\Controllers;

use App\Repositories\ContentBannerRepository;
use App\Repositories\EventRepository;
use App\Repositories\SettingRepository;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $event, $setting;

    public function __construct(EventRepository $event,SettingRepository $setting)
    {
        $this->event = $event;
        $this->setting = $setting;
    }

    public function index()
    {
        $setting = $this->setting->where('slug','banner-image')->first();
        $events = $this->event->where('is_active','1')->orderBy('created_at','desc')->paginate(6);
        return view('event.index')->withEvents($events)->withSetting($setting);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $setting = $this->setting->where('slug','banner-image')->first();

        $event = $this->event->where('slug',$slug)->where('is_active','1')->first();
        $events = $this->event->where('is_active','1')->get();

        return view('event.show')->withEvent($event)->withEvents($events)->withSetting($setting);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
