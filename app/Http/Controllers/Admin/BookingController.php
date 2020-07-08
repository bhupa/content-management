<?php

namespace App\Http\Controllers\Admin;

use App\Mail\BookingConfirmation;
use App\Mail\UserBooking;
use App\Repositories\BookingRepository;
use App\Repositories\RoomlistRepository;
use App\Repositories\SettingRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $bookings, $roomlist, $setting;
    public function __construct(BookingRepository $bookings,RoomlistRepository $roomlist, SettingRepository $setting)
    {
        $this->bookings = $bookings;
        $this->roomlist =$roomlist;
        $this->setting = $setting;
    }

    public function index()
    {
       $bookings = $this->bookings->orderBy('created_at','desc')->paginate('100');
       return view('admin.booking.index')->withBookings($bookings);
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
    public function show($id)
    {
        //
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

    public function changeStatus(Request $request)
    {

        $this->authorize('master-policy.perform',['booking', 'changeStatus']);
        $booking = $this->bookings->find($request->get('id'));



        if ($booking->is_active == 0) {
            $status = '1';
            $message = $booking->room->name . '" has been booked for "'.$booking->first_name.''.$booking->last_name ;
        } else {
            $status = '0';
            $message = $booking->room->name . '" has been Cancled for " '.$booking->first_name.''. $booking->last_name ;
        }

        $this->bookings->changeStatus($booking->id, $status);
        $this->bookings->update($booking->id,['is_active' =>  $status ]);
        $updated = $this->bookings->find($request->get('id'));
        $updated ['room-name'] = $updated ->room->name;

        $companyemail =  $this->setting->where('name' ,'Company Email')->first();
        $companyname =  $this->setting->where('name' ,'Company Name')->first();

        Mail::to($booking->email)->send(new  BookingConfirmation($updated,$companyname,$companyemail));
        return response()->json(['status' => 'ok', 'message' => $message, 'response' => $updated], 200);
    }
}
