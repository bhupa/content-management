<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\DownloadRequest;
use App\Http\Requests\Admin\DownloadUpdateRequest;
use App\Repositories\DownloadRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public $title = 'Download';

    protected $download;

    public function __construct(DownloadRepository $download)
    {
        $this->download = $download;
        auth()->shouldUse('admin');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('master-policy.perform', ['download', 'view']);
        $title = $this->title;
        $downloads = $this->download->orderBy('display_order', 'asc')->paginate('100');
        return view('admin.download.index')->withTitle($title)->withDownloads($downloads);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('master-policy.perform', ['download', 'add']);
        $title = 'Add Download';
        return view('admin.download.create')->withTitle($title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(DownloadRequest $request)
    {

        $this->authorize('master-policy.perform', ['download', 'add']);

        $data = $request->except(['file']);

           if($request->file){

            $file = $request->file;
            $filename  =time()."_".$file->getClientOriginalName();
               $data['file'] = 'download/'. $filename;
               Storage::put('download/'.$filename, file_get_contents($file->getRealPath()));
           }
        $data['is_active'] = isset($data['is_active']) ? 1 : 0;
        $data['created_by'] = Auth::user()->id;
        if($this->download->create($data)){
            return redirect()->route('admin.download.index')
                ->with('flash_notice', 'Download Created Successfully.');
        }
        return redirect()->back()->withInput()
            ->with('flash_notice', 'Download can not be Create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Download';
        $download = $this->download->find($id);
        return view('admin.download.edit', compact('title', 'download'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(DownloadUpdateRequest $request, $id)
    {
        $this->authorize('master-policy.perform', ['download', 'add']);
        $download = $this->download->find($id);
        $data = $request->except(['file']);

            if($request->file){

                $file = $request->file;
                $filename  =time()."_".$file->getClientOriginalName();
                $data['file'] = 'download/'. $filename;
                Storage::put('download/'.$filename, file_get_contents($file->getRealPath()));
                if(Storage::exists($download->file)){
                    Storage::delete($download->file);

                }

        }
        $data['is_active'] = isset($data['is_active']) ? 1 : 0;
        $data['updated_by'] = Auth::user()->id;
        if($this->download->update($download->id, $data)){
            return redirect()->route('admin.download.index')
                ->with('flash_notice', 'Download Updated Successfully.');
        }

        return redirect()->back()->withInput()
            ->with('flash_notice', 'Download can not be Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        $download = $this->download->find($request->get('id'));
        $this->download->update($download->id, array('deleted_by' => Auth::user()->id));
        if(  $this->download->destroy($download->id)){
            $message = 'Download item deleted successfully.';
            return response()->json(['status' => 'ok', 'message' => $message], 200);
        }
        return response()->json(['status' => 'error', 'message' => ''], 422);
    }

    public function changeStatus(Request $request)
    {
        $download = $this->download->find($request->get('id'));
        if ($download->is_active == 0) {
            $status = 1;
            $message = 'Download with title "' . $download->title . '" is published.';
        } else {
            $status = 0;
            $message = 'Download with title "' . $download->title . '" is unpublished.';
        }

        $this->download->changeStatus($download->id, $status);
        $this->download->update($download->id, array('updated_by' => Auth::user()->id));
        $updated = $this->download->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'response' => $updated], 200);
    }

    public function sort(Request $request){
        $exploded = explode('&', str_replace('item[]=', '', $request->order));
        for ($i=0; $i < count($exploded) ; $i++) {
            $this->download->update($exploded[$i], ['display_order' => $i]);
        }
        return json_encode(['status' => 'success', 'value' => 'Successfully reordered.'], 200);
    }
}
