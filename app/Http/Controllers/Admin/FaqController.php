<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\FaqStoreRequest;
use App\Http\Requests\Admin\FaqUpdateRequest;
use App\Repositories\FaqRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $faq;

    public function __construct(FaqRepository $faq)
    {
        $this->faq = $faq;
    }

    public function index()
    {
        $this->authorize('master-policy.perform', ['faq', 'view']);
        $faqs = $this->faq->orderBy('display_order','asc')->paginate('20');
        return view('admin.faq.index')->withFaqs($faqs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('master-policy.perform', ['faq', 'add']);
        return view('admin.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaqStoreRequest $request)
    {
        $this->authorize('master-policy.perform', ['faq', 'add']);
        $data = $request->except(['_token']);
        $data['is_active'] = isset($request['is_active']) ? 1 : 0;
        if($this->faq->create($data)){
            return redirect()->route('admin.faq.index')->with('flash_notice','Faq is created Successfully');

        }
        return redirect()->back()->withInput()->with('flash_notice','Faq can not be created ');

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
        $this->authorize('master-policy.perform', ['faq', 'edit']);
        $faq = $this->faq->find($id);
        return view('admin.faq.edit')->withFaq($faq);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FaqUpdateRequest $request, $id)
    {
        $this->authorize('master-policy.perform', ['faq', 'edit']);
        $faq= $this->faq->find($id);
        $data = $request->except(['_token']);
        $data['is_active'] = isset($request['is_active']) ? 1 : 0;
        if($this->faq->update($faq->id,$data)){
            return redirect()->route('admin.faq.index')->with('flash_notice','Faq is update Successfully');

        }
        return redirect()->back()->withInput()->with('flash_notice','Faq can not be update ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        $faq = $this->faq->find($request->get('id'));
        if(  $this->faq->destroy($faq->id)){
            $message = 'Faq item deleted successfully.';
            return response()->json(['status' => 'ok', 'message' => $message], 200);
        }
        return response()->json(['status' => 'error', 'message' => ''], 422);
    }

    public function changeStatus(Request $request)
    {
        $faq = $this->faq->find($request->get('id'));
        if ($faq->is_active == 0) {
            $status = 1;
            $message = 'faq with title "' . $faq->question . '" is published.';
        } else {
            $status = 0;
            $message = 'faq with title "' . $faq->question . '" is unpublished.';
        }

        $this->faq->changeStatus($faq->id, $status);
        $updated = $this->faq->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'response' => $updated], 200);
    }

    public function sort(Request $request){
        $exploded = explode('&', str_replace('item[]=', '', $request->order));
        for ($i=0; $i < count($exploded) ; $i++) {
            $this->faq->update($exploded[$i], ['display_order' => $i]);
        }
        return json_encode(['status' => 'success', 'value' => 'Successfully reordered.'], 200);
    }
}
