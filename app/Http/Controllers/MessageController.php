<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MessageController extends Controller
{

    public function store(Request $request)
    {
        $user_id = Auth::id();
        $is_message_image = $request->hasFile('image_file');
        $is_video_file = $request->hasFile("video_file");
        if($is_message_image && !$is_video_file){
            $image_path = Storage::disk("public")->putFile('message/image',$request->file("image_file"));
            $dm_image = "/storage/app/public/".$image_path;
            $dm_video = null;
        }else if(!$is_message_image && $is_video_file){
            $video_path = Storage::disk("public")->putFile('message/video',$request->file("image_file"));
            $dm_image = null;
            $dm_video = '/storage/app/public/'.$video_path;
        }else{
            $dm_image=null;
            $dm_video=null;
        }
        Message::create([
            "user_id"=>$user_id,
            "direct_message"=>$request->direct_message,
            "dm_image"=>$dm_image,
            "dm_video"=>$dm_video,
            "room_id"=>$request->room_id
        ]);
        return response()->json([
            "result"=>"success",
            "message"=>"post message"
        ],200);
    }

    public function update(Request $request,$message_id)
    {
        $user_id = Auth::id();
        $message_id = $request->message_id;
        $is_message_image = $request->hasFile('image_file');
        $is_video_file = $request->hasFile("video_file");
        if($is_message_image && !$is_video_file){
            $image_path = Storage::disk("public")->putFile('message/image',$request->file("image_file"));
            $dm_image = "/storage/app/public/".$image_path;
            $dm_video = null;
        }else if(!$is_message_image && $is_video_file){
            $video_path = Storage::disk("public")->putFile('message/video',$request->file("image_file"));
            $dm_image = null;
            $dm_video = '/storage/app/public/'.$video_path;
        }else{
            $dm_image=null;
            $dm_video=null;
        }

        $message=Message::where("id",$message_id)->first();

        $message->update([
            "user_id"=>$user_id,
            "direct_message"=>$request->direct_message,
            "dm_image"=>$dm_image,
            "dm_video"=>$dm_video,
            "room_id"=>$request->room_id
        ]);
        return response()->json([
            "result"=>"success",
            "message"=>"updated message"
        ],200);
    }

    public function show(Request $request)
    {
        $user_id = Auth::id();
        $room_id = $request->room_id;
        $message = DB::table("messages")
            ->where("room_id",$room_id)
            ->get();
        return response()->json([
            "result"=>"success",
            "data"=>$message
        ],200);
    }

    public function message_detail(Request $request, $message_id)
    {
        $user_id = Auth::id();
        $message = DB::table("messages")
            ->where("id",$message_id)
            ->first();
        return response()->json([
            "status"=>"success",
            "data"=> $message
        ],200);
    }
    public function delete(Request $request,$message_id)
    {
        $message = Message::where("id",$message_id)->first();
        $message->delete();

        return response()->json([
            "result"=>"success",
            "data"=> "delete message."
        ],200); 
    }
}
