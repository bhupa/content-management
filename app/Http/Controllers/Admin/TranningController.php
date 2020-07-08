<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\TranningStoreRequest;
use App\Http\Requests\Admin\TranningUpdateRequest;
use App\Repositories\TranningRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TranningController extends Controller
{
    protected  $tranning;

    public function __construct(TranningRepository $tranning)
    {
        $this->tranning =$tranning;
    }
    public function index(){

        $trannings = $this->tranning->orderBy('created_at', 'asc')->paginate('20');

        return view('admin.tranning.index')->withTrannings($trannings);
    }
    public function create(){
        return view('admin.tranning.create');
    }
    public function store(TranningStoreRequest $request){

        $data = $request->except(['image']);
        if ($request->get('image')) {
            $saveName = sha1(date('YmdHis') . str_random(3));
            $image = $request->get('image');
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageData = base64_decode($image);
            $data['image'] = 'tranning/'. $saveName . '.png';
            Storage::put($data['image'], $imageData);
        }

        $data['is_active'] = isset($data['is_active']) ? 1 : 0;
        if($this->tranning->create($data)){
            return redirect()->route('admin.tranning.index')
                ->with('flash_notice', 'Tranning Created Successfully.');
        }
        return redirect()->back()->withInput()
            ->with('flash_notice', 'Tranning can not be created.');

    }
    public function edit($id){
        $tranning= $this->tranning->find($id);
        return view('admin.tranning.edit')->withTranning($tranning);
    }
    public function update(TranningUpdateRequest $request, $id){
        $team= $this->tranning->find($id);
        $data = $request->except(['image']);
        if ($request->get('image')) {
            $saveName = sha1(date('YmdHis') . str_random(3));
            $image = $request->get('image');
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageData = base64_decode($image);
            $data['image'] = 'tranning/'. $saveName . '.png';
            Storage::put($data['image'], $imageData);
        }

        $data['is_active'] = isset($data['is_active']) ? 1 : 0;
        if($this->tranning->update($team->id ,$data)){
            return redirect()->route('admin.tranning.index')
                ->with('flash_notice', 'Tranning Update Successfully.');
        }
        return redirect()->back()->withInput()
            ->with('flash_notice', 'Tranning can not be Update.');

    }
    public function destroy(Request $request,$id){
        $tranning = $this->tranning->findOrfail($id);
        
        if($this->tranning->destroy($tranning->id)){
            $message = 'Tranning deleted successfully.';
            return response()->json(['status' => 'ok', 'message' => $message], 200);
        }
        return response()->json(['status' => 'error', 'message' => ''], 422);
    }
    public function changeStatus(Request $request){
        $tranning = $this->tranning->find($request->get('id'));
        if ($tranning->is_active == 0) {
            $statu = '1';
            $message = 'Tranning with title "' . $tranning->name . '" is published.';
        } else {
            $statu = '0';
            $message = 'Tranning with title "' . $tranning->name . '" is unpublished.';
        }
        $this->tranning->update($tranning->id,['is_active' => $statu]);
        $updated = $this->tranning->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'response' => $updated], 200);
    }
    public function sort(Request $request){

        $exploded = explode('&', str_replace('item[]=', '', $request->order));
        for ($i=0; $i < count($exploded) ; $i++) {
            $this->tranning->update($exploded[$i], ['display_orders' => $i]);
        }
        return json_encode(['status' => 'success', 'value' => 'Successfully reordered.'], 200);
    }


}
