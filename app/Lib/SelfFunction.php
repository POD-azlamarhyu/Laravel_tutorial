<?php

namespace App\Lib;

use Illuminate\Support\Str;

class SelfFunction
{

    private static $seed_en = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

    public static function random_content($seed) : string
    {
        /**
         * 
        * @return string
        */
        
        return substr(str_shuffle(str_repeat(self::$seed_en,100)),0,$seed-1);
    }

    public static function get_random_code() : string 
    {
        return substr(str_shuffle(str_repeat(self::$seed_en,100)),0,8);
    }
}