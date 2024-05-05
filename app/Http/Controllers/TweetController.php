<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tweets = Tweet::all();
        // var_dump($tweets);


        return response()->json([
            "result"=>"success",
            "data"=>$tweets
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function tweet_detail(Request $request,$tweet_id) : JsonResponse {
        $tweet = Tweet::with('user')
            ->where('id',$tweet_id)
            ->get();

        return response()->json([
            "result"=>"success",
            "data"=>$tweet
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = Auth::id();
        $is_tweet_image = $request->hasFile('image_file');
        $is_video_file = $request->hasFile("video_file");
        if($is_tweet_image && !$is_video_file){
            $image_path = Storage::disk("public")->putFile('tweet/image',$request->file("image_file"));
            $tweet_image = "/storage/app/public/".$image_path;
            $tweet_video = null;
        }else if(!$is_tweet_image && $is_video_file){
            $video_path = Storage::disk("public")->putFile('tweet/video',$request->file("image_file"));
            $tweet_image = null;
            $tweet_video = '/storage/app/public/'.$video_path;
        }else{
            $tweet_image=null;
            $tweet_video=null;
        }

        Tweet::create([
            "user_id"=>$user_id,
            "content"=>$request->content,
            "tweet_image"=>$tweet_image,
            "tweet_video"=>$tweet_video,
        ]);
        return response()->json([
            "result"=>"success",
            "message"=>"posted tweet"
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tweet $tweet)
    {
        $data = $tweet;
        return response()->json([
            "result"=>"success",
            "data"=>$data
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tweet $tweet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $tweet_id)
    {   
        $user_id = Auth::id();
        $tweet = Tweet::where("id",$tweet_id)->first();
        // var_dump($tweet);
        // return ;
        // echo $tweet;
        echo "user_id: ".$tweet->user_id."\n";
        echo "content: ".$tweet->content."\n";
        echo "image: ".$tweet->tweet_image."\n";
        if(!$tweet && $tweet->user_id == $user_id){
            echo "\n";
        }else{
            return response()->json([
                "result"=>"failed",
                "message"=>"doesnot update tweet.",
                "cause"=>"Not a valid user."
            ],400);
        }
        $is_tweet_image = $request->hasFile('image_file');
        $is_video_file = $request->hasFile("video_file");
        if($is_tweet_image && !$is_video_file){
            $image_path = Storage::disk("public")->putFile('tweet/image',$request->file("image_file"));
            $tweet_image = "/storage/app/public/".$image_path;
            $tweet_video = null;
        }else if(!$is_tweet_image && $is_video_file){
            $video_path = Storage::disk("public")->putFile('tweet/video',$request->file("image_file"));
            $tweet_image = null;
            $tweet_video = '/storage/app/public/'.$video_path;
        }else{
            $tweet_image=null;
            $tweet_video=null;
        }
        $tweet->update([
            "content"=>$request->content,
            "tweet_image"=>$tweet_image,
            "tweet_video"=>$tweet_video,
        ]);

        return response()->json([
            "result"=>"success",
            "message"=>"updated tweet."
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tweet $tweet)
    {
        $tweet->delete();

        return response()->json([
            "result"=>"success",
            "message"=>"delete tweet."
        ],200);
    }

    public function delete(Request $request,$tweet_id){
        $user_id = Auth::id();
        var_dump($tweet_id);
        var_dump($user_id);
        // dd($user_id);
        try{
            $tweet = DB::table('tweets')
            ->where("id",$tweet_id)
            ->where("user_id",$user_id)
            ->get();
            $tweet->delete();
            return response()->json([
                "result"=>"success",
                "message"=>"delete tweet."
            ],200);
        }catch(QueryException $ex){
            Log::alert("catch Query Exception",["tweet"=>"tweet"]);
            return response()->json([
                "result"=>"failed",
                "message"=>"doesnot delete tweet."
            ],400);
        }catch(Exception $ex){
            Log::critical("catch Exception");
            return response()->json([
                "result"=>"failed",
                "message"=>"doesnot delete tweet."
            ],400);
        }


    }
}
