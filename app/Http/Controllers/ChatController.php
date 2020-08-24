<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSent;
use App\Message;
use Auth;

class ChatController extends Controller
{
    public function index(){
        return view('chat');
    }

    public function getMessages(){
        return Message::with('user')->get();
    }

    public function broadcastMessage(Request $request){

        $user = Auth::user();
        

        // $message = $user->messages()->create([
        //     'message' => $request->message
        // ]);

        $message = new Message;
        $message->user_id = $user->id;
        $message->message = $request->message;
        $message->save();


         //BROADCAST EVENTNYA 
        broadcast(new MessageSent($user, $message))->toOthers();
        return response()->json(['status' => 'Message Sent!']);
    }
}