<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\TeamStoreRequest;
use App\Http\Requests\Admin\TeamUpdateRequest;
use App\Repositories\MemberTypeRepository;
use App\Repositories\TeamRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Auth;

class TeamController extends Controller
{
    
    protected $team, $memberType;
    
    public function __construct(MemberTypeRepository $memberType, TeamRepository $team)
    {
        $this->memberType = $memberType;
        $this->team =$team;
    }
     public function index(){
         
         $teams = $this->team->orderBy('display_orders', 'asc')->paginate('100');
         
         return view('admin.team.index')->withTeams($teams);
     }
    public function create(){
        $members = $this->memberType->orderBy('created_at', 'asc')->get();
        return view('admin.team.create')->withMembers($members);
    }
    public function store(TeamStoreRequest $request){

        $data = $request->except(['image']);
        if ($request->get('image')) {
            $saveName = sha1(date('YmdHis') . str_random(3));
            $image = $request->get('image');
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageData = base64_decode($image);
            $data['image'] = 'service/'. $saveName . '.png';
            Storage::put($data['image'], $imageData);
        }

        $data['is_active'] = isset($data['is_active']) ? 1 : 0;
        if($this->team->create($data)){
            return redirect()->route('admin.team.index')
                ->with('flash_notice', 'Team Created Successfully.');
        }
        return redirect()->back()->withInput()
            ->with('flash_notice', 'Team can not be created.');

    }
    public function edit($id){
        $team= $this->team->find($id);
        $members = $this->memberType->orderBy('created_at', 'asc')->get();
        return view('admin.team.edit')->withMembers($members)->withTeam($team);
    }
    public function update(TeamUpdateRequest $request, $id){
        $team= $this->team->find($id);
        $data = $request->except(['image']);
        if ($request->get('image')) {
            $saveName = sha1(date('YmdHis') . str_random(3));
            $image = $request->get('image');
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageData = base64_decode($image);
            $data['image'] = 'service/'. $saveName . '.png';
            Storage::put($data['image'], $imageData);
        }

        $data['is_active'] = isset($data['is_active']) ? 1 : 0;
        if($this->team->update($team->id ,$data)){
            return redirect()->route('admin.team.index')
                ->with('flash_notice', 'Team Update Successfully.');
        }
        return redirect()->back()->withInput()
            ->with('flash_notice', 'Team can not be Update.');

    }
    public function destroy(Request $request,$id){
        $team = $this->team->findOrfail($id);
        if($this->team->destroy($team->id)){
            $message = 'Service deleted successfully.';
            return response()->json(['status' => 'ok', 'message' => $message], 200);
        }
        return response()->json(['status' => 'error', 'message' => ''], 422);
    }
    public function changeStatus(Request $request){
        $team = $this->team->find($request->get('id'));
        if ($team->is_active == 0) {
            $statu = '1';
            $message = 'team with title "' . $team->title . '" is published.';
        } else {
            $statu = '0';
            $message = 'team with title "' . $team->title . '" is unpublished.';
        }
        $this->team->update($team->id,['is_active' => $statu]);
        $updated = $this->team->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'response' => $updated], 200);
    }
    public function sort(Request $request){

        $exploded = explode('&', str_replace('item[]=', '', $request->order));
        for ($i=0; $i < count($exploded) ; $i++) {
            $this->team->update($exploded[$i], ['display_orders' => $i]);
        }
        return json_encode(['status' => 'success', 'value' => 'Successfully reordered.'], 200);
    }


}
