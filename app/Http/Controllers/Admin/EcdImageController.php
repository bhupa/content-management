<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\EcdImageRepository;
use App\Repositories\EcdRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Image;

class EcdImageController extends Controller
{
    protected $image;

    public function __construct(EcdRepository $ecd, EcdImageRepository $image)
    {
        $this->ecd = $ecd;
        $this->image = $image;
        auth()->shouldUse('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $this->authorize('master-policy.perform',['ecd','view']);
        $ecd = $this->ecd->find($id);
        $images = $this->image->where('ecd_id', $id)->get();
        return view('admin.ecd.image')->withEcd($ecd)->withImages($images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $this->authorize('master-policy.perform',['ecd','add']);
        $ecd = $this->ecd->find($id);
        return view('admin.ecd.uploadImages')->withEcd($ecd);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->authorize('master-policy.perform',['ecd','add']);
        $data = $request->except(['file']);
        $file = $request->file('file');
        $file_name = time()."_".$file->getClientOriginalName();
        $data['ecd_id'] = $id;
        $data['image'] = 'ecdImages/'. $id. '/' .$file_name;
        Storage::put('ecdImages/'.$id.'/'.$file_name, file_get_contents($file->getRealPath()));

        $this->image->create($data);
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
    public function destroy(Request $request, $gallery_id, $id)
    {
        $this->authorize('master-policy.perform',['ecd','delete']);
        $ecdimage = $this->image->find($id);
        if($this->image->destroy($ecdimage->id)) {
            if (Storage::exists($ecdimage->image)) {
                Storage::delete($ecdimage->image);
            }
            $message = 'Ecd Album Image deleted successfully.';
            return response()->json(['status' => 'ok', 'message' => $message], 200);
        }
        return response()->json(['status' => 'error', 'message' => ''], 422);
    }
}
