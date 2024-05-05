<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function toggle_favorite(Request $request)
    {
        $user_id = Auth::id();
        $tweet_id = $request->tweet_id;
        $favorite = Favorite::where("user_id",$user_id)
            ->where("tweet_id",$tweet_id)
            ->first();
        
        if($favorite){
            $favorite->delete();
            return response()->json([
                "result"=>"success",
                "message"=>"removed favorite."
            ]);
        }else{
            Favorite::create([
                "tweet_id"=>$tweet_id,
                "user_id"=>$user_id
            ]);
            return response()->json([
                "result"=>"success",
                "message"=>"added favorite."
            ]);
        }

    }

    public function is_exist_favorite(Request $request)
    {
        $user_id = Auth::id();
        $tweet_id = $request->tweet_id;

        $favorite = Favorite::where("user_id",$user_id)
            ->where("tweet_id",$tweet_id)
            ->exists();

        return response()->json([
            "result"=>"success",
            "exists"=>$favorite
        ]);
    }

    public function tweet_favorite_count(Request $request)
    {
        $user_id = Auth::id();
        $tweet_id = $request->tweet_id;

        $favorite_num = Favorite::where("tweet_id",$tweet_id)
            ->count();
        
        return response()->json([
            "result"=>"success",
            "data"=>$favorite_num
        ],200);
    }

    public function favorite_tweets(Request $request)
    {
        $user_id = Auth::id();
        $tweets = Favorite::with('tweets')->where("user_id",$user_id)->get();
        return response()->json([
            "result"=>"success",
            "data"=>$tweets
        ],200);
    }
}
