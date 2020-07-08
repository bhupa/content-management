<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\TestimonialStoreRequest;
use App\Http\Requests\Admin\TestimonialUpdateRequest;
use App\Repositories\TestimonialsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Image;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $testimonials;
    public  function __construct(TestimonialsRepository $testimonials)
    {
        $this->testimonials =$testimonials;
        auth()->shouldUse('admin');
    }

    public function index()
    {
        $this->authorize('master-policy.perform', ['testimonial', 'view']);
        $testimonials = $this->testimonials->orderBy('created_at', 'desc')->get();
        return view('admin.testimonials.index')->withTestimonials( $testimonials);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('master-policy.perform', ['testimonial', 'add']);
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestimonialStoreRequest $request)
    {
        $this->authorize('master-policy.perform', ['testimonial', 'add']);
        $data = $request->except(['image']);
        if($request->get('image')){
            $saveName = sha1(date('YmdHis').str_random(3));
            $image = $request->get('image');
            $image = str_replace('data:image/png;base64','',$image);
            $image= str_replace('','+',$image);
            $imageData= base64_decode($image);
            $data['image'] = 'testimonial/'.$saveName.'.png';
            Storage::put($data['image'],$imageData);
        }
        $data['is_active'] = isset($request['is_active']) ? 1 : 0;
        if($this->testimonials->create($data)){
            return redirect()->route('admin.testimonials.index')->with('flash_notice','Testinomials is created Successfully');

        }
        return redirect()->back()->withInput()->with('flash_notice','Testinomials can not be created ');
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
        $this->authorize('master-policy.perform', ['testimonial', 'edit']);
        $testimonial = $this->testimonials->find($id);
        return view('admin.testimonials.edit')->withTestimonial($testimonial);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TestimonialUpdateRequest $request, $id)
    {

        $this->authorize('master-policy.perform', ['testimonial', 'edit']);
        $testimonial = $this->testimonials->find($id);
        $data = $request->only(['name','description','rating']);
        if($request->get('image')){
            $saveName = sha1(date('YmdHis').str_random(3));
            $image = $request->get('image');
            $image = str_replace('data:image/png;base64','',$image);
            $image= str_replace('','+',$image);
            $imageData= base64_decode($image);
            $data['image'] = 'testimonial/'.$saveName.'.png';
            Storage::put($data['image'],$imageData);
        }
            $data['is_active'] = isset($request['is_active']) ? 1 : 0;
        if($this->testimonials->update($testimonial->id,$data)){
            return redirect()->route('admin.testimonials.index')->with('flash_notice','Testimonials is Update Successfully');

        }
        return redirect()->back()->withInput()->with('flash_notice','Testimonials can not be Update ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id){

        abort_if(Gate::denies('master-policy.perform', ['testimonial', 'delete']), 403);

         $this->validate($request, [
            'id' => 'required|exists:testimonials,id',
        ]);
        $testimonial = $this->testimonials->findOrfail($id);

            $this->testimonials->destroy($testimonial ->id);
            $message = 'Testimonials deleted successfully.';
            return response()->json(['status' => 'ok', 'message' => $message], 200);
       
    }
    public function changeStatus(Request $request){
        $this->authorize('master-policy.perform', ['testimonial', 'changeStatus']);
        $testimonial = $this->testimonials->find($request->get('id'));
        if ($testimonial->is_active == 0) {
            $status = '1';
            $message = 'Testimonials with title "' . $testimonial->name . '" is published.';
        } else {
            $status = '0';
            $message = 'Testimonials with title "' . $testimonial->name . '" is unpublished.';
        }
        $this->testimonials->changeStatus($testimonial->id, $status);
        $this->testimonials->update($testimonial->id,['is_active' => $status]);
        $updated = $this->testimonials->find($request->get('id'));

        return response()->json(['status' => 'ok', 'message' => $message, 'response' => $updated], 200);
    }
}
