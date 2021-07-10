<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Chat;
use App\Events\MessageSent;
use App\Message;
use Auth;

class ChatController extends Controller
{
    public function index()
    {
        $chat = Chat::all();
        return view('video_chat.chat', compact('chat'));
    }
    
    public function __construct(){
        $this -> middleware('auth');
    }
    
    public function getMessages()
    {
        //MENGAMBIL SEMUA LOG PESAN BESERTA USER YANG MENJADI PEMILIKNYA MENGGUNAKAN EAGER LOADING
        //PEMBAHASAN MENGENAI EAGER LOADING BISA DI CARI DI DAENGWEB.ID
        return Message::with('user')->get();
    }

    //FUNGSI UNTUK BROADCAST SERTA MENYIMPAN KE DATABASE
    public function broadcastMessage(Request $request)
    {
        $user = Auth::user(); //AMBIL USER YANG SEDANG LOGIN
        //SIMPAN DATA KE TABLE MESSAGES MELALUI USER
        $message = $user->messages()->create([
            'message' => $request->message
        ]);

        //BROADCAST EVENTNYA 
        broadcast(new MessageSent($user, $message))->toOthers();
        return response()->json(['status' => 'Message Sent!']);
    }
    
    
    // public function chat()
    // {
    //     $chat = Chat::all();
    //     return view('video_chat.ichat', compact('chat'));
    // }


    // public function message(){
    //     $results = DB::table('v_chat')->get();

    //     $messages = array();

    //     foreach($results as $row){
    //         $chat = array();

    //         if($row->user === auth()->user()->id){
    //             $chat['user'] = "You";
    //             $chat['flag'] = false;
    //         }else{
    //             $chat['user'] = $row->name;
    //             $chat['flag'] = true;
    //         }
    //         $chat['message'] = $row->message;
    //         $chat['created_at'] = \Carbon\Carbon::parse($row->created_at)->diffForHumans();
    //         $chat['photo'] = $row->photo;

    //         $message[] = $chat;
    //     }

    //     return response()->json($messages);
    // }

    // public function save(Request $r){
    //     $r->validate([
    //         'message' => 'required'
    //     ]);

    //     $chat = Chat::create([
    //         'user' => auth()->user()->id,
    //         'message' => $r->message,
    //     ]);

    //     return response()->json($chat);
    // }
}
