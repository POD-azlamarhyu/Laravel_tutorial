<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Tweet;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function favorite_tweets_with_prof(Request $request)
    {
        $user_id = Auth::id();
        $query = DB::table('tweets as tw')
            ->select(
                'tw.id as tweet_id',
                'tw.user_id as tweet_user_id',
                'tw.content',
                'tw.tweet_image as image',
                'tw.tweet_video as video',
                'tw.created_at',
                'uis.userinfo_id',
                'uis.account_name',
                'uis.icon',
                'uis.user_bio',
                'uis.account_id',
                'fv.tweet_id as favorite_tweet',
                'fv.user_id as favorite_user'
            )
            ->leftJoin('user_infos as uis','tw.user_id',"=","uis.user_id")
            ->leftJoin('favorites as fv',"tw.id","=","fv.tweet_id")
            ->where("fv.user_id",$user_id)
            ->orderBy('tw.created_at')
            ->toSql();
        // echo $query."\n\n";
        $data = DB::table('tweets as tw')
            ->select(
                'tw.id as tweet_id',
                'tw.user_id as tweet_user_id',
                'tw.content',
                'tw.tweet_image as image',
                'tw.tweet_video as video',
                'tw.created_at',
                'uis.userinfo_id',
                'uis.account_name',
                'uis.icon',
                'uis.user_bio',
                'uis.account_id',
                'fv.tweet_id as favorite_tweet',
                'fv.user_id as favorite_user'
            )
            ->leftJoin('user_infos as uis','tw.user_id',"=","uis.user_id")
            ->leftJoin('favorites as fv',"tw.id","=","fv.tweet_id")
            ->where("fv.user_id",$user_id)
            ->orderBy('tw.created_at')
            ->get();
            return response()->json([
                "result"=>"success",
                "data"=>$data
            ],200);
        
    }

    public function favorite_tweets_with_prof_favnumber(Request $request)
    {
        $user_id = Auth::id();
        $favorite_table = DB::table('favorites')
            ->select(DB::raw('tweet_id, count(user_id) as favorite_number'))
            ->groupBy('tweet_id');
        echo $favorite_table->toSql();
        $query = DB::table('tweets as tw')
            ->select(
                'tw.id as tweet_id',
                'tw.user_id as tweet_user_id',
                'tw.content',
                'tw.tweet_image as image',
                'tw.tweet_video as video',
                'tw.created_at',
                'uis.userinfo_id',
                'uis.account_name',
                'uis.icon',
                'uis.user_bio',
                'uis.account_id',
                'fv.tweet_id as favorite_tweet',
                'fv.user_id as favorite_user',
                'fav_tb.favorite_number'
            )
            ->leftJoin('user_infos as uis','tw.user_id',"=","uis.user_id")
            ->leftJoin('favorites as fv',"tw.id","=","fv.tweet_id")
            ->leftJoinSub($favorite_table,'fav_tb',function (JoinClause $join){
                $join->on('tw.id',"=","fav_tb.tweet_id");
            })
            ->where("fv.user_id",$user_id)
            ->orderBy('tw.created_at')
            ->toSql();
        echo $query."\n\n";
        $data = DB::table('tweets as tw')
            ->select(
                'tw.id as tweet_id',
                'tw.user_id as tweet_user_id',
                'tw.content',
                'tw.tweet_image as image',
                'tw.tweet_video as video',
                'tw.created_at',
                'uis.userinfo_id',
                'uis.account_name',
                'uis.icon',
                'uis.user_bio',
                'uis.account_id',
                'fv.tweet_id as favorite_tweet',
                'fv.user_id as favorite_user',
                'fav_tb.favorite_number as favorite_number'
            )
            ->leftJoin('user_infos as uis','tw.user_id',"=","uis.user_id")
            ->leftJoin('favorites as fv',"tw.id","=","fv.tweet_id")
            ->leftJoinSub($favorite_table,'fav_tb',function (JoinClause $join){
                $join->on('tw.id',"=","fav_tb.tweet_id");
            })
            ->where("fv.user_id",$user_id)
            ->orderBy('tw.created_at')
            ->get();
            
            return ;
            return response()->json([
                "result"=>"success",
                "data"=>$data
            ],200);
        
    }
}
