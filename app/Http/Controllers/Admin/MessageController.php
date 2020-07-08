<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\MessageStoreRequest;
use App\Http\Requests\Admin\MessageUpdateRequest;
use App\Repositories\MemberTypeRepository;
use App\Repositories\MessageRepository;
use App\Repositories\TeamRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    protected $message,$team, $memberType;
    public function __construct(MessageRepository $message, TeamRepository $team, MemberTypeRepository  $memberType)
    {
        $this->message = $message;
        $this->team=$team;
        $this->memberType=$memberType;
    }

    public function index()
    {
        $messages = $this->message->orderBy('created_at', 'desc')->paginate('20');
        return view('admin.message.index')->withMessages($messages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $executive =  $this->memberType->where('name','Central Executive Board')->first();
        $chairperson = $this->team->where('is_active',1)->where('member_type_id', $executive->id)->orderBy('display_orders', 'asc')->get();
        return view('admin.message.create')->withchairperson($chairperson);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MessageStoreRequest $request)
    {
        $data = $request->except(['_token']);
        $data['is_active'] = isset($request->is_active) ? 1:0;
        if($this->message->create($data)){
            return redirect()->route('admin.messages.index')
                ->with('flash_notice', 'Messages Created Successfully.');
        }
        return redirect()->back()->withInput()
            ->with('flash_notice', 'Messages can not be Create.');
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
        $executive =  $this->memberType->where('name','Central Executive Board')->first();
        $chairperson = $this->team->where('is_active',1)->where('member_type_id', $executive->id)->orderBy('display_orders', 'asc')->get();
        $message = $this->message->find($id);
        return view('admin.message.edit')
            ->withMessage($message)
            ->withchairperson($chairperson);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MessageUpdateRequest $request, $id)
    {
        $message = $this->message->find($id);
        $data = $request->except(['_token']);
        $data['is_active'] = isset($request->is_active) ? 1:0;
        if($this->message->update($message->id, $data)){
            return redirect()->route('admin.messages.index')
                ->with('flash_notice', 'Message Updated Successfully.');
        }

        return redirect()->back()->withInput()
            ->with('flash_notice', 'Message can not be Updated ');
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
            'id' => 'required|exists:message,id',
        ]);
        $message = $this->message->find($request->get('id'));
        $this->message->destroy($message->id);
        $message = 'Message is deleted successfully.';
        return response()->json(['status' => 'ok', 'message' => $message], 200);
    }

    public function changeStatus(Request $request)
    {
        $message = $this->message->find($request->get('id'));


        if ($message->is_active == 0) {
            $status = 1;
            $messages = 'Message From  "' . $message->team->name . '" is published.';
        } else {
            $status = 0;
            $messages = 'Message From  "' . $message->team->name . '" is unpublished.';
        }

        $this->message->changeStatus($message->id, $status);
        $updated = $this->message->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $messages, 'response' => $updated], 200);
    }

    public function sort(Request $request){
        $exploded = explode('&', str_replace('item[]=', '', $request->order));
        for ($i=0; $i < count($exploded) ; $i++) {
            $this->messages->update($exploded[$i], ['display_orders' => $i]);
        }
        return json_encode(['status' => 'success', 'value' => 'Successfully reordered.'], 200);
    }
}
