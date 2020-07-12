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
        $this->upload_path = DIRECTORY_SEPARATOR.'events'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }


    public function index(){

        auth()->user()->can('master-policy.perform', ['event', 'view']);
        $events = $this->event->OrderBy('created_at','desc')->paginate('100');
        return view('admin.event.index')->withEvents($events);
    }

    public function create(){
        auth()->user()->can('master-policy.perform', ['event', 'add']);
        return view('admin.event.create');
    }


    public  function store(EventRequest $request){

        auth()->user()->can('master-policy.perform', ['event', 'add']);
        $data = $request->except('_token','image');
        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'events/'.$fileName;

        }
        $data['is_active'] = isset($request->is_active) ? 1:0;
        $data['created_by'] = auth()->user()->id;

        if($this->event->create($data)){
            return redirect()->route('admin.event.index')
                ->with('flash_notice', 'Event Created Successfully.');
        }
        return redirect()->back()->withInput()
            ->with('flash_notice', 'Event can not be Create.');

    }
    public function edit($id)
    {
        auth()->user()->can('master-policy.perform',['event','edit']);
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
        auth()->user()->can('master-policy.perform',['event','edit']);
        $event = $this->event->find($id);
        $data= $request->except(['image']);
        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'events/'.$fileName;

        }

        $data['is_active'] = isset($data['is_active']) ? 1 : 0;
        $data['updated_by'] = auth()->user()->id;

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
        auth()->user()->can('master-policy.perform',['event','delete']);
        $event = $this->event->find($id);

        if($this->event->destroy($event->id)){
            $message = 'Event deleted successfully.';
            return response()->json(['status' => 'ok', 'message' => $message], 200);
        }

        return response()->json(['status' => 'error', 'message' => ''], 422);
    }

    public function changeStatus(Request $request)
    {
        auth()->user()->can('master-policy.perform',['event','changeStatus']);
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
