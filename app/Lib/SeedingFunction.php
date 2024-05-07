<?php

namespace App\Lib;

class SeedingFunction{
    public static function create_favorite_user_id(){
        $user_array = [1,2,3,4,5,1,2,3,4,5,1,3,1,2,2,3,3,4,4,5,5,1,1,2,2,2,1,1,1,5,1,4,4,1,2,3,4,2,3,4,2,2,3,2,1,2,3,4,4,4,];
        $index = array_rand($user_array,1);
        return $user_array[$index];
    }
    public static function create__user_id(){
        $user_array = [1,2,3,4,5,1,2,3,4,5,1,3,1,2,2,3,3,4,4,5,5,1,1,2,2,2,1,1,1,5,1,4,4,1,2,3,4,2,3,4,2,2,3,2,1,2,3,4,4,4,6,6,6,7,7,7,7,8,8,8,8,8,8,9,9,9,9,10,10,10,10,1,2,3,4,5,1,3,1,2,2,3,3,4,4];
        $index = array_rand($user_array,1);
        return $user_array[$index];
    }
}