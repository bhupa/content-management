<?php

namespace App\Http\Controllers\Admin;


use App\Repositories\PopupRepository;
use function GuzzleHttp\Psr7\str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Validator;

class PopupController extends Controller
{
    public $title = 'Popup';

    protected $popup;
    public function __construct(PopupRepository $popup)
    {
        $this->popup = $popup;
        auth()->shouldUse('admin');
    }
    public function index(){
        $this->authorize('master-policy.perform',['popup','view']);
        $title = $this->title;
        $popups = $this->popup->orderBy('created_at', 'desc')->get();
        return view('admin.popup.index')->withTilte($title)->withPopups($popups);
    }
    public function create(){
        $this->authorize('master-policy.perform',['popup','add']);
       return view('admin.popup.create');
    }
    public function store(Request $request)
    {

        $rules = [
            'title' => 'required',
            'image' => 'required'
        ];

        $messages = [
            'title.required' => 'Please Insert The Title',
            'image.required' => 'Please Upload valid Image File'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $data=$request->except(['image']);
            if($request->get('image')){
                $saveName = sha1(date('YmdHis').str_random(3));
                $image = $request->get('image');
                $image = str_replace('data:image/png;base64','',$image);
                $image = str_replace('','+',$image);
                $imageData = base64_decode($image);
                $data['image']= 'popup/'.$saveName.'.png';
                Storage::put($data['image'],$imageData);

            }
            $data['is_active']= isset($request['is_active']) ? 1:0;
            if($this->popup->create($data)){
                return redirect()->route('admin.popup.index')->with('flash_notice','Popup is created Successfully');
            }
            return redirect()->back()->withInput()->with('flash_notice','Popup is can not be create');

        }
    }
    public function changeStatus(Request $request){
        $this->authorize('master-policy.perform',['popup','changeStatus']);
        $popup = $this->popup->find($request->get('id'));
        if ($popup->is_active == 0) {
            $popup->is_active = '1';
            $message = 'Popup with title "' . $popup->title . '" is published.';
        } else {
            $popup->is_active = '0';
            $message = 'Popup with title "' . $popup->title . '" is unpublished.';
        }
        $this->popup->update($popup->id,['is_active' => $popup->is_active]);
        $updated = $this->popup->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'response' => $updated], 200);
    }
    public function edit($id){
        $this->authorize('master-policy.perform',['popup','edit']);
       $popup = $this->popup->findOrfail($id);
       return view('admin.popup.edit')->withPopup($popup);
    }

    public function update( Request $request, $id)
    {
        $this->authorize('master-policy.perform', ['popup','edit']);
        $data=$request->except(['image','_token','_method']);
        $popup = $this->popup->find($id);
        if($request->get('image')){
            $saveName = sha1(date('YmdHis').str_random(3));
            $image = $request->get('image');
            $image = str_replace('data:image/png;base64','',$image);
            $image = str_replace('','+',$image);
            $imageData = base64_decode($image);
            $data['image']= 'popup/'.$saveName.'.png';
            Storage::put($data['image'],$imageData);
            if(Storage::exists($popup->image)){
                Storage::delete($popup->image);
            }

        }
        $data['is_active']= isset($request['is_active']) ? 1:0;
        if($this->popup->update($popup->id, $data)){
            return redirect()->route('admin.popup.index')->with('flash_notice','Popup is Update Successfully');
        }
       return redirect()->back()->withInput()->with('flash_notice','Popup can not be Update');

    }
    public function destroy(Request $request,$id){
        $this->authorize('master-policy.perform',['popup','delete']);
        $popup = $this->popup->findOrfail($id);
        if($this->popup->destroy($popup->id)){
            $message = 'Popup deleted successfully.';
            return response()->json(['status' => 'ok', 'message' => $message], 200);
        }
        return response()->json(['status' => 'error', 'message' => ''], 422);
    }
    public function sort(Request $request){
        dd($request);
        $exploded = explode('&', str_replace('item[]=', '', $request->order));
        for ($i=0; $i < count($exploded) ; $i++) {
            $this->popup->update($exploded[$i], ['display_order' => $i]);
        }
        return json_encode(['status' => 'success', 'value' => 'Successfully reordered.'], 200);
    }
}
