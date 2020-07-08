<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\SettingStoreRequest;
use App\Http\Requests\Admin\SettingUpdateRequest;
use App\Repositories\SiteSettingRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteSettingController extends Controller
{

    protected  $setting;
    protected $type = [
        "1"    => "Link",
        "2"  =>"Text"
    ];

    public function __construct(SiteSettingRepository $setting)
    {
        $this->setting = $setting;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perpage ='100';
        $settings = $this->setting->paginate($perpage);
        return view('admin.siteSetting.index')->withSettings($settings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = $this->type;
        return view('admin.siteSetting.create')->withType($type);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SettingStoreRequest $request)
    {

        $data = $request->except('_token','image');
        $data['is_active'] = isset($request) ? 1 : 0;
        $data['value'] =$request->url;
        if ($this->setting->create($data)) {
            return redirect()->route('admin.setting.index')
                ->with('flash_notice', 'Setting Created Successfully.');
        }
        return redirect()->back()->withInput()
            ->with('flash_notice', 'Setting  can not be Create .');

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
        $setting = $this->setting->find($id);
        $type = $this->type;
        return view('admin.siteSetting.edit')->withType($type)->withSetting($setting);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SettingUpdateRequest $request, $id)
    {
        $setting = $this->setting->find( $id);
        $data=$request->except(['_token','_method']);
        if(!empty($request->url)){
            $data['value'] =$request->url;
        }
        if ($this->setting->update(  $setting->id,$data)) {
            return redirect()->route('admin.setting.index')
                ->with('flash_notice', 'Setting Updated Successfully.');
        }
        return redirect()->back()->withInput()
            ->with('flash_notice', 'Setting  can not be Updated .');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $setting = $this->setting->find($request->get('id'));
        if($this->setting->destroy($setting->id)){
            $message = 'Setting item deleted successfully.';
            return response()->json(['status' => 'ok', 'message' => $message], 200);
        }
        return response()->json(['status' => 'error', 'message' => ''], 422);
        //
    }
    public function changeStatus(Request $request)
    {
        $setting = $this->setting->find($request->get('id'));

        if ($setting->is_active == 0) {
            $status = 1;
            $message = 'Setting with Name "' . $setting->name . '" is published.';
        } else {
            $status = 0;
            $message = 'Setting with Name "' . $setting->name . '" is unpublished.';
        }

        $this->setting->changeStatus($setting->id,$status);
        $this->setting->where('id',  $setting->id)->update(['is_active'=>$status]);
        $updated = $this->setting->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'response' => $updated], 200);
    }
}
