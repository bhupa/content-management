<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\AdvertisementRepository;
use App\Repositories\PlacementRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdvertisementController extends Controller
{

    public $title = 'Advertisement';

    protected $placement;

    protected $advertisement;

    public function __construct(PlacementRepository $placement, AdvertisementRepository $advertisement){
        $this->placement = $placement;
        $this->advertisement = $advertisement;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title;
        $ads = $this->advertisement->allWith('placement');
        return view('admin.ads.index', compact('title', 'ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add Advertisement';
        $placement = $this->placement->all();
        return view('admin.ads.create', compact('title', 'placement'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->advertisement->where('placement_id', $request->placement_id)->where('is_active', 1)->count() > 0){
            return redirect()->back()->withInput()->with('flash_error', 'Advertisement in the placement already exists. Please delete or disable it before adding in this placement.');;
        }
        $data = $request->all();
        $data['is_active'] = (isset($data['is_active']) && $data['is_active'] != 0) ? 1 : 0;
        $data['created_by'] = Auth::user()->id;
        $ads = $this->advertisement->create($data);
        return redirect()->route('admin.ads.index')
            ->with('flash_notice', 'Advertisement Created Successfully.');
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
        $title = 'Edit Advertisement';
        $ad = $this->advertisement->find($id);
        $placement = $this->placement->all();
        return view('admin.ads.edit', compact('title', 'ad', 'placement'));

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
        if($this->advertisement->where('placement_id', $request->placement_id)->where('is_active', 1)->count() > 0){
            return redirect()->back()->withInput()->with('flash_error', 'Advertisement in the placement already exists. Please delete or disable it before adding in this placement.');;
        }
        $data = $request->all();
        $data['is_active'] = (isset($data['is_active']) && $data['is_active'] != 0) ? 1 : 0;

        if(isset($data['image']) && $data['image'] == "")
            unset($data['image']);

        $data['updated_by'] = Auth::user()->id;

        $ads = $this->advertisement->update($id, $data);

        return redirect()->route('admin.ads.index')
            ->with('flash_notice', 'Advertisement Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request, $id)
    {
        $this->validate($request, [
            'id' => 'required|exists:advertisements,id',
        ]);
        $advertisement = $this->advertisement->find($request->get('id'));
        $this->advertisement->update($advertisement->id, array('deleted_by' => Auth::user()->id));
        $this->advertisement->destroy($advertisement->id);
        $message = 'Advertisement deleted successfully.';
        return response()->json(['status' => 'ok', 'message' => $message], 200);
    }

    public function changeStatus(Request $request)
    {
        $advertisement = $this->advertisement->find($request->get('id'));
        if ($advertisement->is_active == 0) {
            $status = 1;
            $message = 'Advertisement is published.';
        } else {
            $status = 0;
            $message = 'Advertisement is unpublished.';
        }

        $this->advertisement->changeStatus($advertisement->id, $status);
        $this->advertisement->update($advertisement->id, array('status_by' => Auth::user()->id));
        $updated = $this->advertisement->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'response' => $updated], 200);
    }
}
