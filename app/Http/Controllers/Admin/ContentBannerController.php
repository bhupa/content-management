<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\BannerRequest;
use App\Http\Requests\Admin\BannerUpdateRequest;
use App\Http\Requests\Admin\ContentBannerRequest;
use App\Http\Requests\Admin\ContentBannerUpdateRequest;
use App\Repositories\ContentBannerRepository;
use App\Repositories\ImageResizeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ContentBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $contentbanner,$image_resize;

    public function __construct(ContentBannerRepository $contentbanner, ImageResizeRepository $image_resize)
    {
        $this->contentbanner = $contentbanner;
        $this->image_resize = $image_resize;
    }

    public function index()
    {
        $contentbanners = $this->contentbanner->orderBy('created_at','desc')->paginate('100');
        return view('admin.content-banner.index')->withContentbanners($contentbanners);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $imageresize = $this->image_resize->where('alias','content-banner')->first();
        return view('admin.content-banner.create')->withImageresize($imageresize);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContentBannerRequest $request)
    {
        $this->authorize('master-policy.perform', ['content-banner', 'add']);
        $data = $request->except(['image']);

        if($request->get('image')){
            $saveName = sha1(date('YmdHis') . str_random(3));
            $image = $request->get('image');
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageData = base64_decode($image);
            $data['image'] = 'content-banner/'. $saveName . '.png';

            Storage::put($data['image'], $imageData);
        }
        $data['is_active'] = isset($data['is_active']) ? 1 : 0;

        $data['created_by'] = Auth::user()->id;
        if($this->contentbanner->create($data)){
            return redirect()->route('admin.content-banner.index')
                ->with('flash_notice', 'Content Banner Created Successfully.');
        }

        return redirect()->back()->withInput()
            ->with('flash_notice', 'Content Banner can not be created.');
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
        $this->authorize('master-policy.perform', ['content-banner', 'edit']);
        $title = 'Edit Banner';
        $contentbanner = $this->contentbanner->find($id);
        return view('admin.content-banner.edit')->withContentbanner($contentbanner)->withTitle($title);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContentBannerUpdateRequest $request, $id)
    {
        $this->authorize('master-policy.perform', ['content-banner', 'edit']);
        $contentbanner = $this->contentbanner->find($id);
        $data = $request->except(['image']);
        if($request->get('image')){
            $saveName = sha1(date('YmdHis') . str_random(3));
            $image = $request->get('image');
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageData = base64_decode($image);
            $data['image'] = 'content-banner/'. $saveName . '.png';
            Storage::put($data['image'], $imageData);
            if(Storage::exists($contentbanner->image)){
                Storage::delete($contentbanner->image);
            }
        }
        $data['is_active'] = isset($data['is_active']) ? 1 : 0;
        $data['updated_by'] = Auth::user()->id;
        if($this->contentbanner->update( $contentbanner->id,$data)){
            return redirect()->route('admin.content-banner.index')
                ->with('flash_notice', 'Content Banner Updated Successfully.');
        }

        return redirect()->back()->withInput()
            ->with('flash_notice', 'Content Banner can not be Updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this->authorize('master-policy.perform', ['content-banner', 'delete']);
        $contentbanner = $this->contentbanner->find($id);
        if($this->contentbanner->destroy($contentbanner->id)){
            Storage::delete($contentbanner->image);
            $message = 'Content Banner deleted successfully.';
            return response()->json(['status' => 'ok', 'message' => $message], 200);

        }

        return response()->json(['status' => 'error', 'message' => ''], 422);
    }

    public function changeStatus(Request $request)
    {
        $this->authorize('master-policy.perform', ['content-banner', 'changeStatus']);
        $contentbanner = $this->contentbanner->find($request->get('id'));
        if ($contentbanner->is_active == 0) {
            $status = 1;
            $message = 'Content Banner is published.';
        } else {
            $status = 0;
            $message = 'Content Banner is unpublished.';
        }

        $this->contentbanner->changeStatus($contentbanner->id, $status);
        $this->contentbanner->update($contentbanner
            ->id, array('updated_by' => Auth::user()->id));
        $updated = $this->banner->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'response' => $updated], 200);
    }


}
