<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ProgramStoreRequest;
use App\Http\Requests\Admin\ProgramUpdateRequest;
use App\Repositories\ProgramRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Auth;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $program;

    public function __construct(ProgramRepository $program)
    {
        $this->program = $program;
        auth()->shouldUse('admin');
    }

    public function index()
    {
        $this->authorize('master-policy.perform', ['programs', 'view']);
        $programs = $this->program->orderBy('created_at', 'desc')->paginate('100');
        return view('admin.program.index')->withprograms($programs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('master-policy.perform', ['programs', 'add']);
        return view('admin.program.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProgramStoreRequest $request)
    {

        $this->authorize('master-policy.perform', ['programs', 'add']);

        $data = $request->except(['file','image']);

        if(!empty($request->file)){
            $rx = '~
                  ^(?:https?://)?                           # Optional protocol
                   (?:www[.])?                              # Optional sub-domain
                   (?:youtube[.]com/watch[?]v=|youtu[.]be/) # Mandatory domain name (w/ query string in .com)
                   ([^&]{11})                               # Video id of 11 characters as capture group 1
                    ~x';
            $url = $request->file;
            if(preg_match($rx ,$url)){
                parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
                $data['file'] = $url = $my_array_of_vars['v'];

            }
            else{
                $data['file'] = 'Null';
            }
        }
        if($request->get('image')){
            $saveName = sha1(date('YmdHis').str_random(3));
            $image = $request->get('image');
            $image = str_replace('data:image/png;base64','',$image);
            $image= str_replace('','+',$image);
            $imageData= base64_decode($image);
            $data['image'] = 'programs/'.$saveName.'.png';
            Storage::put($data['image'],$imageData);
        }
        $data['is_active'] = isset($data['is_active']) ? 1 : 0;
        $data['created_by'] = Auth::user()->id;
        if($this->program->create($data)){
            return redirect()->route('admin.programs.index')
                ->with('flash_notice', 'Program Created Successfully.');
        }
        return redirect()->back()->withInput()
            ->with('flash_notice', 'Program can not be Create');
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
        $this->authorize('master-policy.perform', ['programs', 'edit']);
        $program = $this->program->find($id);
        return view('admin.program.edit')->withProgram($program);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProgramUpdateRequest $request, $id)
    {


        $this->authorize('master-policy.perform', ['programs', 'add']);
        $program = $this->program->find($id);
        $data = $request->except(['file','image']);

        if($request->file){
            $rx = '~
                  ^(?:https?://)?                           # Optional protocol
                   (?:www[.])?                              # Optional sub-domain
                   (?:youtube[.]com/watch[?]v=|youtu[.]be/) # Mandatory domain name (w/ query string in .com)
                   ([^&]{11})                               # Video id of 11 characters as capture group 1
                    ~x';
            $url = $request->file;
            if(preg_match($rx ,$url)){
                parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
                $data['file'] = $url = $my_array_of_vars['v'];

            }
            else{
                return redirect()->back()->withErrors(['file'=>'vidoe link is not Valid']);
            }
        }
        if($request->get('image')){
            $saveName = sha1(date('YmdHis').str_random(3));
            $image = $request->get('image');
            $image = str_replace('data:image/png;base64','',$image);
            $image= str_replace('','+',$image);
            $imageData= base64_decode($image);
            $data['image'] = 'programs/'.$saveName.'.png';
            Storage::put($data['image'],$imageData);
            if(Storage::exists($program->image)){
                Storage::delete($program->image);

            }
        }
        $data['is_active'] = isset($data['is_active']) ? 1 : 0;
        $data['created_by'] = Auth::user()->id;
        if($this->program->update($program->id,$data)){
            return redirect()->route('admin.programs.index')
                ->with('flash_notice', 'Program  Program Successfully.');
        }
        return redirect()->back()->withInput()
            ->with('flash_notice', 'Program can not be Program');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this->authorize('master-policy.perform', ['programs', 'delete']);
        $program = $this->program->find($request->get('id'));
        $this->program->update($program->id, array('deleted_by' => Auth::user()->id));
        if(  $this->program->destroy($program->id)){
            $message = 'Program item deleted successfully.';
            return response()->json(['status' => 'ok', 'message' => $message], 200);
        }
        return response()->json(['status' => 'error', 'message' => ''], 422);
    }

    public function changeStatus(Request $request)
    {
        $program = $this->program->find($request->get('id'));
        if ($program->is_active == 0) {
            $status = 1;
            $message = 'program with title "' . $program->title . '" is published.';
        } else {
            $status = 0;
            $message = 'program with title "' . $program->title . '" is unpublished.';
        }

        $this->program->changeStatus($program->id, $status);
        $this->program->update($program->id, array('is_active' =>  $status));
        $updated = $this->program->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'response' => $updated], 200);
    }

    public function sort(Request $request){
        $exploded = explode('&', str_replace('item[]=', '', $request->order));
        for ($i=0; $i < count($exploded) ; $i++) {
            $this->program->update($exploded[$i], ['display_order' => $i]);
        }
        return json_encode(['status' => 'success', 'value' => 'Successfully reordered.'], 200);
    }
}
