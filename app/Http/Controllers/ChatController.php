<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\SendMsgEvent;

class ChatController extends Controller
{
    public function getChatView()
    {
        return view('chat');
    }

    public function chat(Request $request)
    {
        $msg = $request->get('msg');
        if ($msg) {
            broadcast(new SendMsgEvent($msg))->toOthers();
            return response()->json(['result' => 'ok'], 200);
        }
    }
}
