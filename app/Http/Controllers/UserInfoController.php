<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UserInfoController extends Controller
{
    public function index(){
        
        $infos = UserInfo::all();
        Log::debug($infos);
        // var_dump($infos);
        return response()->json([
            'result'=>'success',
            'data'=>$infos
        ],200);
    }

    public function index_all(Request $request){
        $infos=UserInfo::with('user')
            ->orderBy('id')
            ->all();
        return response()->json([
            'result'=>'success',
            'data'=>$infos
        ]);
    }

    public function create(){

    }

    public function store(Request $request){
        $user_id = Auth::id();
        $is_icon_file=$request->hasFile("icon");
        if($is_icon_file){
            $icon_path = Storage::disk("public")->putFile('userinfo/icon',$request->file("icon"));
            $icon_file='/storage/app/public/'.$icon_path;
        }else{
            $icon_file=null;
        }
        UserInfo::create([
            'user_id'=> $user_id,
            'account_name'=>$request->account_name,
            'icon'=>$icon_file,
            'user_bio'=>$request->user_bio,
            'account_id'=>$request->account_id,
        ]);

        return response() -> json([
            'result'=>'success',
            'message'=>'store user info.'
        ],200);
    }

    public function show(Request $request){
        $auth_user = Auth::user();
        $user_id = Auth::id();
        // var_dump($user_id);

        $data = UserInfo::with('user')
            ->where('user_id',$user_id)
            ->get();
        return response()->json([
            'result'=>'success',
            'data'=>$data
        ]);
    }

    public function update(Request $request,UserInfo $userinfo){
        $user_id = Auth::id();
        $is_icon_file=$request->hasFile("icon");
        if($is_icon_file){
            $icon_path = Storage::disk("public")->putFile('userinfo/icon',$request->file("icon"));
            $icon_file='/storage/app/public/'.$icon_path;
        }else{
            $icon_file=null;
        }
        $userinfo->update([
            'account_name'=>$request->account_name,
            'icon'=>$icon_file,
            'user_bio'=>$request->user_bio,
            'account_id'=>$request->account_id,
        ]);

        return response()->json([
            "result"=>"success",
            "data"=>$userinfo,
            "message"=>"delete user info."
        ]);
    }

    public function delete(Request $request,UserInfo $userinfo){
        $userinfo->delete();

        return response()->json([
            "result"=>"success",
            "message"=>"delete user info."
        ]);
    }


    public function delete_userinfo(Request $request,UserInfo $userinfo_id){
        $userinfo = UserInfo::where('userinfo_id',$userinfo_id);
        $userinfo->delete();

        return response()->json([
            "result"=>"success",
            "message"=>"delete user info."
        ]);
    }

    public function patch(Request $request,$userinfo_id){
        $is_icon_file=$request->hasFile("icon");
        if($is_icon_file){
            $icon_file='/storage/app/icon/'.$request->file("icon")->getClientOriginalName();
        }else{
            $icon_file=null;
        }
        $userinfo = UserInfo::findOrFail($userinfo_id);
        $userinfo->update([
            'account_name'=>$request->account_name,
            'icon'=>$icon_file,
            'user_bio'=>$request->user_bio,
            'account_id'=>$request->account_id,
        ]);

        return response()->json([
            "result"=>"success",
            "data"=>$userinfo,
            "message"=>"delete user info."
        ]);
    }
}
