<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CountStoreRequest;
use App\Repositories\CountRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountController extends Controller
{
    protected $count;
    
    
    public function  __construct(CountRepository $count)
    {
        $this->count= $count;
    }
    public function index(){
        
        $counts = $this->count->orderBy('created_at','desc')->paginate('20');
        return view('admin.count.index')->withCounts( $counts);
    }
    public function create(){
        return view('admin.count.create');
    }
    
    public function store(CountStoreRequest $request){
        $data = $request->except(['_token']);

        $data['is_active'] = isset($data['is_active']) ? 1 : 0;
        if($this->count->create($data)){
            return redirect()->route('admin.counts.index')
                ->with('flash_notice', 'Content Count Created Successfully.');
        }
        return redirect()->back()->withInput()
            ->with('flash_notice', 'Content Count can not be created.');
    }
    public function edit($id){
        $count= $this->count->find($id);
        return view('admin.count.edit')->withCount( $count);
    }
    public function update(CountStoreRequest $request,$id){
        $data = $request->except(['_token']);
        $count= $this->count->find($id);
        $data['is_active'] = isset($data['is_active']) ? 1 : 0;
        if($this->count->update( $count->id,$data)){
            return redirect()->route('admin.counts.index')
                ->with('flash_notice', 'Content Count Updated Successfully.');
        }
        return redirect()->back()->withInput()
            ->with('flash_notice', 'Content Count can not be Updated.');
    }

    public function destroy(Request $request,$id){
        $team = $this->count->findOrfail($id);
        if($this->count->destroy($team->id)){
            $message = 'Count deleted successfully.';
            return response()->json(['status' => 'ok', 'message' => $message], 200);
        }
        return response()->json(['status' => 'error', 'message' => ''], 422);
    }
    public function changeStatus(Request $request){
        $count = $this->count->find($request->get('id'));
        if ($count->is_active == 0) {
            $statu = '1';
            $message = 'count with title "' . $count->name . '" is published.';
        } else {
            $statu = '0';
            $message = 'count with title "' . $count->name . '" is unpublished.';
        }
        $this->count->update($count->id,['is_active' => $statu]);
        $updated = $this->count->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'response' => $updated], 200);
    }
    public function sort(Request $request){

        $exploded = explode('&', str_replace('item[]=', '', $request->order));
        for ($i=0; $i < count($exploded) ; $i++) {
            $this->team->update($exploded[$i], ['display_orders' => $i]);
        }
        return json_encode(['status' => 'success', 'value' => 'Successfully reordered.'], 200);
    }

}
