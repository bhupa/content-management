<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\EcdStoreRequest;
use App\Repositories\EcdRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Auth;

class EcdController extends Controller
{
    protected $gallery;

    public function __construct(EcdRepository $ecd){
        $this->ecd = $ecd;
        auth()->shouldUse('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('master-policy.perform',['ecd','view']);
        $ecds = $this->ecd->orderBy('created_at','desc')->paginate('20');
        return view('admin.ecd.index')->withEcds($ecds);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('master-policy.perform',['ecd','add']);
        $title = 'Add Gallery';
        return view('admin.ecd.create')->withTitle($title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EcdStoreRequest $request)
    {
        $data = $request->except(['image']);
        if($request->get('image')){
            $saveName=sha1(date('YmdHis').str_random(3));
            $image = $request->get('image');
            $image = str_replace('data:image/png;base64','',$image);
            $image = str_replace('','+', $image);
            $imageData = base64_decode(   $image);
            $data['image'] = 'ecd/'.$saveName.'png';
            Storage::put($data['image'],   $imageData);

        }
        $data['is_active'] = isset($request->is_active) ? 1:0;
        $data['created_by'] = Auth::user()->id;
        if($this->ecd->create($data)){
            return redirect()->route('admin.ecd.index')
                ->with('flash_notice', 'ecd Created Successfully.');
        }
        return redirect()->back()->withInput()
            ->with('flash_notice', 'ecd can not be Create.');
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
        $this->authorize('master-policy.perform',['ecd','edit']);
        $title = 'Edit Ecd';
        $ecd = $this->ecd->find($id);
        return view('admin.ecd.edit')->withEcd($ecd)->withTitle($title);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EcdStoreRequest $request, $id)
    {
        $this->authorize('master-policy.perform',['gallery','edit']);
        $ecd = $this->ecd->find($id);
        $data= $request->except(['image']);
        if($request->get('image')){
            $saveName = sha1(date('YmdHis').str_random(3));
            $image = $request->get('image');
            $image = str_replace('data:image/png;base64','',$image);
            $image = str_replace('','+', $image);
            $imageData =base64_decode($image);
            $data['image']= 'ecd/'.$saveName.'png';
            Storage::put($data['image'], $imageData);
            if(Storage::exists($ecd->image)){
                Storage::delete($ecd->image);
            }

        }

        $data['is_active'] = isset($data['is_active']) ? 1 : 0;
        $data['updated_by'] = Auth::user()->id;
        if($this->ecd->update($ecd->id, $data)){
            return redirect()->route('admin.ecd.index')
                ->with('flash_notice', 'Ecd Updated Successfully.');
        };

        return redirect()->back()->withInput()
            ->with('flash_notice', 'Ecd Can not be Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this->authorize('master-policy.perform',['ecd','delete']);
        $ecd = $this->ecd->find($id);
       
        if($this->ecd->destroy($ecd->id)){
            $message = 'Ecd deleted successfully.';
            return response()->json(['status' => 'ok', 'message' => $message], 200);
        }

        return response()->json(['status' => 'error', 'message' => ''], 422);
    }

    public function changeStatus(Request $request)
    {
        $this->authorize('master-policy.perform',['gallery','changeStatus']);
        $ecd = $this->ecd->find($request->get('id'));
        if ($ecd->is_active == 0) {
            $status = 1;
            $message = 'Ecd with title "' . $ecd->title . '" is published.';
        } else {
            $status = 0;
            $message = 'Ecd with title "' . $ecd->title . '" is unpublished.';
        }

        $this->ecd->changeStatus($ecd->id, $status);
        $this->ecd->update($ecd->id, array('updated_by' => Auth::user()->id));
        $updated = $this->ecd->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'response' => $updated], 200);
    }

    public function sort(Request $request){

        dd($request->order);
        $exploded = explode('&', str_replace('item[]=', '', $request->order));
        for ($i=0; $i < count($exploded) ; $i++) {
            $this->ecd->update($exploded[$i], ['display_order' => $i]);
        }
        return json_encode(['status' => 'success', 'value' => 'Successfully reordered.'], 200);
    }
}
