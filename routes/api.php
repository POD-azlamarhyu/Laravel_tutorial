<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\UserInfoController;




Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/auth/logout',[AuthController::class,'logout']);
});

Route::post('/auth/login',[AuthController::class,'login']);
Route::post('/auth/signup',[AuthController::class,'singup']);

Route::get('/userinfo/myuser',[UserInfoController::class,'show'])->middleware('auth:sanctum');
Route::get('/userinfo/index',[UserInfoController::class,'index'])->middleware('auth:sanctum');
Route::post('/userinfo/create',[UserInfoController::class,'store'])->middleware('auth:sanctum');
Route::delete('/userinfo/delete/{userinfo}',[UserInfoController::class,'delete'])->middleware('auth:sanctum');
Route::put('/userinfo/update/{userinfo}',[UserInfoController::class,'update'])->middleware('auth:sanctum');

Route::get('/tweet/index',[TweetController::class,'index'])->middleware('auth:sanctum');
Route::post('/tweet/post',[TweetController::class,"store"])->middleware('auth:sanctum');
Route::put('/tweet/update/{tweet_id}',[TweetController::class,"update"])->middleware('auth:sanctum');
Route::get('/tweet/detail/{tweet}',[TweetController::class,"show"])->middleware('auth:sanctum');
Route::get('/tweet/tweet_detail/{tweet_id}',[TweetController::class,"tweet_detail"])->middleware('auth:sanctum');
Route::delete('/tweet/delete/{tweet}',[TweetController::class,"destroy"])->middleware('auth:sanctum');
Route::delete('/tweet/tweet_delete/{tweet_id}',[TweetController::class,"delete"])->middleware('auth:sanctum');

Route::post('/favorite/tweet',[FavoriteController::class,"toggle_favorite"])->middleware('auth:sanctum');
Route::get('/favorite/tweet_favorite_count',[FavoriteController::class,"tweet_favorite_count"])->middleware('auth:sanctum');
Route::get('/favorite/favorite_tweets',[FavoriteController::class,"favorite_tweets"])->middleware('auth:sanctum');

// Route::get('/user', function (Request $request) {
//     return $request->user();
// // })->middleware('auth:sanctum');

