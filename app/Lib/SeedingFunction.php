<?php

namespace App\Lib;

class SeedingFunction{
    public static function create_favorite_user_id(){
        $user_array = [1,2,3,4,5,1,2,3,4,5,1,1,2,2,3,3,4,4,5,5,1,1,2,2,2,1,1,1];
        $index = array_rand($user_array,1);
        return $user_array[$index];
    }
}