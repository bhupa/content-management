<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\RoomlistRequest;
use App\Http\Requests\Admin\RoomlistUpdateRequest;
use App\Repositories\RoomlistRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Validator;

class RoomlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $title = 'Roomlist';

    protected $roomlist;
    public function __construct(RoomlistRepository $roomlist)
    {
        $this->roomlist = $roomlist;
        auth()->shouldUse('admin');
    }

    public function index()
    {
        $this->authorize('master-policy.perform',['room-list','view']);
       $title = $this->title;
        $roomlists = $this->roomlist->orderBy('display_order', 'asc')->get();
        return view('admin.roomlist.index')->withRoomlists($roomlists)->withTitle($title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('master-policy.perform',['room-list','add']);
        return view('admin.roomlist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomlistRequest $request)
    {
        $this->authorize('master-policy.perform',['room-list','add']);

            $data = $request->except(['image']);
            if($request->get('cover_image')){
                $saveName = sha1(date('YmdHis').str_random(3));
                $image = $request->get('cover_image');
                $image = str_replace('data:image/png;base64','',$image);
                $image= str_replace('','+',$image);
                $imageData= base64_decode($image);
                $data['cover_image'] = 'room/'.$saveName.'.png';
                Storage::put($data['cover_image'],$imageData);
            }
            $data['is_active'] = isset($request['is_active']) ? 1 : 0;

            if($this->roomlist->create( $data)){
                return redirect()->route('admin.roomlist.index')->with('flash_notice','Roomlist is created Successfully');
            }
            return redirect()->back()->withInput()->with('flash_notice','Roomlist can not be create');


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
        $this->authorize('master-policy.perform',['room-list','edit']);
        $roomlist = $this->roomlist->findOrfail($id);
        return view('admin.roomlist.edit')->withRoomlist($roomlist);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoomlistUpdateRequest $request, $id)
    {
        $this->authorize('master-policy.perform',['room-list','edit']);


            $data = $request->except(['cover_image','_token','_method']);
            $roomlist = $this->roomlist->find($id);
            if($request->get('cover_image')){
                $saveName = sha1(date('YmdHis').str_random(3));
                $image = $request->get('cover_image');
                $image = str_replace('data:image/png;base64','',$image);
                $image= str_replace('','+',$image);
                $imageData= base64_decode($image);
                $data['cover_image'] = 'room/'.$saveName.'.png';
                Storage::put($data['cover_image'],$imageData);
            }
            $data['is_active'] = isset($request['is_active']) ? 1 : 0;

            if($this->roomlist->update(  $roomlist->id, $data)){
                return redirect()->route('admin.roomlist.index')->with('flash_notice','Roomlist is Updated Successfully');
            }
            return redirect()->back()->withInput()->with('flash_notice','Roomlist can not be Update');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id){

        $this->authorize('master-policy.perform',['room-list','delete']);
        $roomlist = $this->roomlist->findOrfail($id);
        if($this->roomlist->destroy($roomlist->id)){
            $message = 'Roomlist deleted successfully.';
            return response()->json(['status' => 'ok', 'message' => $message], 200);
        }
        return response()->json(['status' => 'error', 'message' => ''], 422);
    }
    public function changeStatus(Request $request){
        $this->authorize('master-policy.perform',['room-list','changeStatus']);
        $roomlist = $this->roomlist->find($request->get('id'));
        if ($roomlist->is_active == 0) {
            $status = '1';
            $message = 'Roomlist with title "' . $roomlist->title . '" is published.';
        } else {
            $status = '0';
            $message = 'Roomlist with title "' . $roomlist->title . '" is unpublished.';
        }
        $this->roomlist->changeStatus(  $roomlist->id, $status);
        $this->roomlist->update($roomlist->id,['is_active' =>  $status ]);
        $updated = $this->roomlist->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'response' => $updated], 200);
    }
    public function sort(Request $request)
    {
        $exploded = explode('&', str_replace('item[]=', '', $request->order));
        for ($i = 0; $i < count($exploded); $i++) {
            $this->roomlist->update($exploded[$i], ['display_order' => $i]);
        }
        return json_encode(['status' => 'success', 'value' => 'Successfully reordered.'], 200);
    }
}
