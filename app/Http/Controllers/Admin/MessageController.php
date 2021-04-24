<?php

namespace App\Http\Controllers\Admin;

use App\Message;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::latest()->get('user_id')->groupby('user_id');

//        dd($messages);
        return view('admin.message.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'message'=>'required',
        ]);

        $id = Auth::user()->id;
        $user = User::find($request->user_id);
        $date = Carbon::now();
//        dd($date);

        $message = new Message();

        $message->user_id = $request->user_id;
        $message->sender_id = $id;
        $message->message = $request->message;
        $message->save();

        Toastr::success('Sent to '.$user->name.' !' ,'Message');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $chat_list = Message::latest()->get('user_id')->groupby('user_id');

        $messages = Message::where('user_id',$user_id)->latest()->paginate(5);

        return view('admin.message.show', compact('chat_list', 'messages','user_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
