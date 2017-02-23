<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function getChatView()
    {
        return view('chat');
    }

    public function chat(Request $request)
    {
        echo(111);
    }
}
