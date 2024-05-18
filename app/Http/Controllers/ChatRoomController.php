<?php

namespace App\Http\Controllers;

use App\Models\ChatRoom;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatRoomController extends Controller
{
    public function store(Request $request)
    {
        $user_id = Auth::id();
        ChatRoom::create([
            "user_id"=>$user_id,
            "chatroom_name"=>$request->chatroom_name,
            "description"=>$request->description,
        ]);
    }

    public function show(Request $request)
    {
        $user_id = Auth::id();
        $rooms = ChatRoom::where("user_id",$user_id)->get();

        return response()->json([
            "result"=>"success",
            "data"=>$rooms,
        ],200);
    }

    public function update(Request $request,$room_id)
    {
        $user_id = Auth::id();
        
        try{
            $chatroom = ChatRoom::where("id",$room_id)->where("user_id",$user_id)->first();
            $chatroom->update([
                "chatroom_name"=>$request->chatroom_name,
                "description"=>$request->description,
            ]);

            return response()->json([
                "result"=>"success",
                "message"=>"updated chatroom."
            ],200);
        }catch(Exception $ex){
            echo $ex;

            return response()->json([
                "result"=>"failed",
                "message"=>"doesnot update chatroom."
            ],400);
        }
    }

    public function delete(Request $request,$room_id)
    {   
        $user_id = Auth::id();
        try{
            $chatroom=ChatRoom::where("id",$room_id)->where("user_id",$user_id)->first();

            $chatroom->delete();
            return response()->json([
                "result"=>"success",
                "message"=>"delete chatroom"
            ],200);
        }catch(Exception $ex){
            echo $ex;

            return response()->json([
                "result"=>"failed",
                "message"=>"doesnot delete chatroom."
            ],400);
        }
    }
}
