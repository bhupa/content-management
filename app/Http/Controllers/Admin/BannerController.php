<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\BannerRequest;
use App\Http\Requests\Admin\BannerUpdateRequest;
use App\Repositories\BannerRepository;
use App\Repositories\ImageResizeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{

    public $title = 'Banner';

    protected $banner;
    protected $image_resize;

    public function __construct(BannerRepository $banner,
                                ImageResizeRepository $image_resize)
    {
        $this->banner = $banner;
        $this->image_resize = $image_resize;
        auth()->shouldUse('admin');

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title;
        $this->authorize('master-policy.perform', ['banner', 'view']);
        $perpage ='100';
        $banners = $this->banner->paginate($perpage);
        return view('admin.banner.index')
        ->withBanners($banners)
            ->withTitle($title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add Banner';
        $this->authorize('master-policy.perform', ['banner', 'add']);
        $imageresize = $this->image_resize->where('alias','banner')->first();
        return view('admin.banner.create')
        ->withTitle($title)
        ->withImageresize($imageresize);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        $this->authorize('master-policy.perform', ['banner', 'add']);
        $data = $request->except(['image']);

        if($request->get('image')){
            $saveName = sha1(date('YmdHis') . str_random(3));
            $image = $request->get('image');
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageData = base64_decode($image);
            $data['image'] = 'banner/'. $saveName . '.png';

            Storage::put($data['image'], $imageData);
        }
        $data['is_active'] = isset($data['is_active']) ? 1 : 0;

        $data['created_by'] = Auth::user()->id;
        if($this->banner->create($data)){
            return redirect()->route('admin.banner.index')
                ->with('flash_notice', 'Banner Created Successfully.');
        }

        return redirect()->back()->withInput()
            ->with('flash_notice', 'Banner can not be created.');
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
        $this->authorize('master-policy.perform', ['banner', 'edit']);
        $title = 'Edit Banner';
        $banner = $this->banner->find($id);
        return view('admin.banner.edit')->withBanner($banner)->withTitle($title);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BannerUpdateRequest $request, $id)
    {
        $this->authorize('master-policy.perform', ['banner', 'edit']);
        $banner = $this->banner->find($id);
        $data = $request->except(['image']);
        if($request->get('image')){
            $saveName = sha1(date('YmdHis') . str_random(3));
            $image = $request->get('image');
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageData = base64_decode($image);
            $data['image'] = 'banner/'. $saveName . '.png';
            Storage::put($data['image'], $imageData);
            if(Storage::exists($banner->image)){
                Storage::delete($banner->image);
            }
        }
        $data['is_active'] = isset($data['is_active']) ? 1 : 0;
        $data['updated_by'] = Auth::user()->id;
        if($this->banner->update( $banner->id,$data)){
            return redirect()->route('admin.banner.index')
                ->with('flash_notice', 'Banner Updated Successfully.');
        }

        return redirect()->back()->withInput()
            ->with('flash_notice', 'Banner can not be Updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this->authorize('master-policy.perform', ['banner', 'delete']);
        $banner = $this->banner->find($id);
        if($this->banner->destroy($banner->id)){
            Storage::delete($banner->image);
            $message = 'Banner deleted successfully.';
            return response()->json(['status' => 'ok', 'message' => $message], 200);

        }

        return response()->json(['status' => 'error', 'message' => ''], 422);
    }

    public function changeStatus(Request $request)
    {
        $this->authorize('master-policy.perform', ['banner', 'changeStatus']);
        $banner = $this->banner->find($request->get('id'));
        if ($banner->is_active == 0) {
            $status = 1;
            $message = 'Banner is published.';
        } else {
            $status = 0;
            $message = 'Banner is unpublished.';
        }

        $this->banner->changeStatus($banner->id, $status);
        $this->banner->update($banner
            ->id, array('updated_by' => Auth::user()->id));
        $updated = $this->banner->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'response' => $updated], 200);
    }

    public function sort(Request $request)
    {
        $exploded = explode('&', str_replace('item[]=', '', $request->order));
        for ($i = 0; $i < count($exploded); $i++) {
            $this->banner->update($exploded[$i], ['display_order' => $i]);
        }
        return json_encode(['status' => 'success', 'value' => 'Successfully reordered.'], 200);
    }

}
