<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\ChatModel;
use DateTime;
use Str;

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
                exit();
            }

            ChatModel::updateCount($sender_id,$receiver_id);
            $data['receiver_id'] = $receiver_id;
            $data['getReceiver'] = User::getSingle($receiver_id);

            $data['getChat'] = ChatModel::getChat($receiver_id, $sender_id);
        }

        else{
            $data['receiver_id'] = "";

        }
        $data['getChatUser'] = ChatModel::getChatUser($sender_id);

        return view('chat.list', $data);
    }
    public function SubmitMessage(Request $request)
    {
        $chat = new ChatModel;
        $chat->sender_id = Auth::user()->id;
        $chat->receiver_id = $request->receiver_id;
        if(!empty($request->message)){
            $chat->message = $request->message;
        }
        else{
            $chat->message = 'Download';
        }
        $chat->created_date = time();
        if(!empty($request->file('file_name'))){

            $ext = $request->file('file_name')->getClientOriginalExtension();
            $file = $request->file('file_name');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/chat',$filename);
            $chat->file = $filename;
        }
     
        
        $chat->save();

        $getChat = ChatModel::where('id', '=', $chat->id)->get();

        return response()->json([
            'status' => true,
            'success' => view('chat._single', [
                'getChat' => $getChat
            ])->render(),
        ], 200);
    }
    public function getChatWindow(Request $request)
    {
        $receiver_id =  $request->receiver_id;
        $sender_id = Auth::user()->id;

        ChatModel::updateCount($sender_id,$receiver_id);

        $getReceiver = User::getSingle($receiver_id);
        $getChat = ChatModel::getChat($receiver_id, $sender_id);
    
        return response()->json([
            'status' => true,
            'receiver_id' =>base64_encode($receiver_id),
            'success' => view('chat._message', [
                'getReceiver' => $getReceiver,
                'getChat' => $getChat
            ])->render(),
        ], 200);
    }
    public function getChatSearchUser(Request $request)
    {
        $receiver_id =  $request->receiver_id;
        $sender_id = Auth::user()->id;
        $getChatUser = ChatModel::getChatUser($sender_id);
        return response()->json([
            'status' => true,
            'success' => view('chat._user', [
                'getChatUser' => $getChatUser,
                'receiver_id' => $receiver_id
            ])->render(),
        ], 200);
    }
        
}
