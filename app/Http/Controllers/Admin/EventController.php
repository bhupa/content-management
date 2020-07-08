<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\EcdStoreRequest;
use App\Http\Requests\Admin\EventRequest;
use App\Http\Requests\Admin\EventUpdateRequest;
use App\Repositories\EventRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    protected $event;

    public function __construct(EventRepository $event)
    {
        $this->event = $event;
    }


    public function index(){

        $events = $this->event->OrderBy('created_at','desc')->paginate('100');
        return view('admin.event.index')->withEvents($events);
    }

    public function create(){
        return view('admin.event.create');
    }


    public  function store(EventRequest $request){

        $data = $request->except('_token','image');
        if($request->get('image')){
            $saveName=sha1(date('YmdHis').str_random(3));
            $image = $request->get('image');
            $image = str_replace('data:image/png;base64','',$image);
            $image = str_replace('','+', $image);
            $imageData = base64_decode(   $image);
            $data['image'] = 'event/'.$saveName.'png';
            Storage::put($data['image'],   $imageData);

        }
        $data['is_active'] = isset($request->is_active) ? 1:0;
        if($this->event->create($data)){
            return redirect()->route('admin.event.index')
                ->with('flash_notice', 'Event Created Successfully.');
        }
        return redirect()->back()->withInput()
            ->with('flash_notice', 'Event can not be Create.');

    }
    public function edit($id)
    {
        $this->authorize('master-policy.perform',['event','edit']);
        $title = 'Edit event';
        $event = $this->event->find($id);
        return view('admin.event.edit')->withEvent($event)->withTitle($title);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventUpdateRequest $request, $id)
    {
        $this->authorize('master-policy.perform',['event','edit']);
        $event = $this->event->find($id);
        $data= $request->except(['image']);
        if($request->get('image')){
            $saveName = sha1(date('YmdHis').str_random(3));
            $image = $request->get('image');
            $image = str_replace('data:image/png;base64','',$image);
            $image = str_replace('','+', $image);
            $imageData =base64_decode($image);
            $data['image']= 'ecd/'.$saveName.'png';
            Storage::put($data['image'], $imageData);
            if(Storage::exists($event->image)){
                Storage::delete($event->image);
            }

        }

        $data['is_active'] = isset($data['is_active']) ? 1 : 0;
        if($this->event->update($event->id, $data)){
            return redirect()->route('admin.event.index')
                ->with('flash_notice', 'Event Updated Successfully.');
        };

        return redirect()->back()->withInput()
            ->with('flash_notice', 'Event Can not be Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this->authorize('master-policy.perform',['event','delete']);
        $event = $this->event->find($id);

        if($this->event->destroy($event->id)){
            $message = 'Event deleted successfully.';
            return response()->json(['status' => 'ok', 'message' => $message], 200);
        }

        return response()->json(['status' => 'error', 'message' => ''], 422);
    }

    public function changeStatus(Request $request)
    {
        $this->authorize('master-policy.perform',['event','changeStatus']);
        $event = $this->event->find($request->get('id'));
        if ($event->is_active == 0) {
            $status = 1;
            $message = 'Event with title "' . $event->title . '" is published.';
        } else {
            $status = 0;
            $message = 'Event with title "' . $event->title . '" is unpublished.';
        }

        $this->event->changeStatus($event->id, $status);
        $updated = $this->event->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'response' => $updated], 200);
    }

    public function sort(Request $request){

        dd($request->order);
        $exploded = explode('&', str_replace('item[]=', '', $request->order));
        for ($i=0; $i < count($exploded) ; $i++) {
            $this->event->update($exploded[$i], ['display_order' => $i]);
        }
        return json_encode(['status' => 'success', 'value' => 'Successfully reordered.'], 200);
    }
}
