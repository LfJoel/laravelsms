<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ChatController extends Controller
{
    public function Chat(Request $request)
    {
        $data['header_title'] = "Chat";

        $sender_id = Auth::user()->id;

        if (!empty($request->receiver_id)) {

            $receiver_id = base64_decode($request->receiver_id);
            if ($receiver_id  == $sender_id) {

                return redirect()->back()->with('error', 'Something is Wrong');
            }
        }

        return view('chat.list', $data);
    }
}
