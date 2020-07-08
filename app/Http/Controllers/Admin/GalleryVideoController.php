<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\GalleryVideoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GalleryVideoController extends Controller
{

    public $title = 'Video Links';

    protected $video;

    public function __construct(GalleryVideoRepository $video){
        $this->video = $video;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title;
        $video = $this->video->orderBy('display_order', 'asc')->orderBy('created_at', 'desc')->get();
        return view('admin.video.index', compact('title', 'video'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $title = 'Add Video';
        return view('admin.video.create')->withId($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except(['_token']);

        if($request->link){
            $rx = '~
                  ^(?:https?://)?                           # Optional protocol
                   (?:www[.])?                              # Optional sub-domain
                   (?:youtube[.]com/watch[?]v=|youtu[.]be/) # Mandatory domain name (w/ query string in .com)
                   ([^&]{11})                               # Video id of 11 characters as capture group 1
                    ~x';
            $url = $request->link;
            if(preg_match($rx ,$url)){
                parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
                $data['link'] = $url = $my_array_of_vars['v'];

            }
            else{
                return redirect()->back()->withErrors(['file'=>'vidoe link is not Valid']);
            }
        }
//        $data['slug']= str_slug($request->title, '-');

        $data['is_active'] = isset($request->is_active) ? 1:0;

        $data['created_by'] = Auth::user()->id;
        $data['gallery_id'] =$request->gallery_id;

        $gallery = $this->video->create($data);
        return redirect()->route('admin.video.show',$request->gallery_id)
            ->with('flash_notice', 'Video Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $videos = $this->video->where('gallery_id',$id)->orderBy('created_at', 'desc')->get();

        return view('admin.video.index')->withVideos($videos)->withId($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $video = $this->video->find($id);

        return view('admin.video.edit')->withVideo($video);
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
        $data = $request->except(['_token']);
        $video = $this->video->find($id);
        if($request->link){
            $rx = '~
                  ^(?:https?://)?                           # Optional protocol
                   (?:www[.])?                              # Optional sub-domain
                   (?:youtube[.]com/watch[?]v=|youtu[.]be/) # Mandatory domain name (w/ query string in .com)
                   ([^&]{11})                               # Video id of 11 characters as capture group 1
                    ~x';
            $url = $request->link;
            if(preg_match($rx ,$url)){
                parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
                $data['link'] = $url = $my_array_of_vars['v'];

            }
            else{
                return redirect()->back()->withErrors(['file'=>'vidoe link is not Valid']);
            }
        }
        $data['is_active'] = (isset($data['is_active']) && $data['is_active'] != 0) ? 1 : 0;
        $data['updated_by'] = Auth::user()->id;
        $data['gallery_id'] =$video->gallery_id;

        $video = $this->video->update($id, $data);
        return redirect()->route('admin.video.show',$video->gallery_id)
            ->with('flash_notice', 'Video Updated Successfully.');
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
            'id' => 'required|exists:gallery_videos,id',
        ]);
        $video = $this->video->find($request->get('id'));
        $this->video->update($video->id, array('deleted_by' => Auth::user()->id));
        $this->video->destroy($video->id);
        $message = 'Video link deleted successfully.';
        return response()->json(['status' => 'ok', 'message' => $message], 200);
    }

    public function changeStatus(Request $request)
    {
        $video = $this->video->find($request->get('id'));
        if ($video->is_active == 0) {
            $status = 1;
            $message = 'Video with title "' . $video->title . '" is published.';
        } else {
            $status = 0;
            $message = 'Video with title "' . $video->title . '" is unpublished.';
        }

        $this->video->changeStatus($video->id, $status);
        $this->video->update($video->id, array('status_by' => Auth::user()->id));
        $updated = $this->video->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'response' => $updated], 200);
    }

    public function sort(Request $request){
        $exploded = explode('&', str_replace('item[]=', '', $request->order));
        for ($i=0; $i < count($exploded) ; $i++) {
            $this->video->update($exploded[$i], ['display_order' => $i]);
        }
        return json_encode(['status' => 'success', 'value' => 'Successfully reordered.'], 200);
    }
}
