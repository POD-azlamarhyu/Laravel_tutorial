<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Routing\Route;

Route::get('/', function () {
    return view('welcome');
});
