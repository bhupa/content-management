<?php

namespace App\Http\Controllers;

use App\Repositories\ContentBannerRepository;
use App\Repositories\EventRepository;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $event, $contentbanner;

    public function __construct(EventRepository $event, ContentBannerRepository $contentbanner)
    {
        $this->event = $event;
        $this->contentbanner = $contentbanner;
    }

    public function index()
    {
        $contentbanner = $this->contentbanner->where('title','Event')->where('is_active', '1')->first();

        $events = $this->event->where('is_active','1')->orderBy('created_at','desc')->latest()->take(6)->get();
       return view('event.index')->withEvents($events)->withContentbanner($contentbanner);
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
        $contentbanner = $this->contentbanner->where('title','Event')->where('is_active', '1')->first();
        $event = $this->event->where('slug',$slug)->where('is_active','1')->first();
        $events = $this->event->where('is_active','1')->get();

        return view('event.show')->withEvent($event)->withEvents($events)->withContentbanner($contentbanner);
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
