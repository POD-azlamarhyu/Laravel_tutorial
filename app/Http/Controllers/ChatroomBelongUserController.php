<?php

namespace App\Http\Controllers;

use App\Models\ChatroomBelongUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatroomBelongUserController extends Controller
{
    public function chatroom_belongs_index(Request $request)
    {
        $user_id = Auth::id();
        $data = ChatroomBelongUser::where("user_id",$user_id)->get();
        return response()->json([
            "result"=>"success",
            "data"=>$data,
        ],200);
    }

    public function index(Request $request)
    {
        $user_id = Auth::id();
        $user_rooms = DB::table('chat_rooms as cr')
            ->leftjoin("chatroom_belong_users as cbu","cr.id","=","cbu.user_id")
            ->where("cbu.user_id",$user_id)
            ->get();
        return response()->json([
            "result"=>"success",
            "data"=>$user_rooms
        ],200);
    }

    public function entrance_leave_rooms(Request $request) {
        $user_id = Auth::id();
        $room_id = $request->room_id;
        $chatroom_belongs = ChatroomBelongUser::where("user_id",$user_id)
            ->where("room_id",$room_id)
            ->first();
        if(!$chatroom_belongs){
            ChatroomBelongUser::create([
                "user_id"=>$user_id,
                "room_id"=>$room_id,
            ]);

            return response()->json([
                "result"=>"success",
                "message"=>"enter chatroom."
            ]);
        }else{
            $chatroom_belongs->delete();
            return response()->json([
                "result"=>"success",
                "message"=>"leave chatroom."
            ]);
        }
    }
}
