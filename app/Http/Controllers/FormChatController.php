<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\TestEvent;

class FormChatController extends Controller
{
    public function formchat(){
        return view('chats');
    }

    public function push(request $request){
        event(new TestEvent($request->pesan));
    }

}
