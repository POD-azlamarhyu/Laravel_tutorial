<?php

namespace App\Lib;
class SelfFunction
{
    public static function random_content()
    {
        /**
         * 
        * @return string
        */
        $seed_jp = "あいうえおかきくけこさしすせそたちつてとなにぬねのはひふへほまみむめもやゆよらりるれろわをん";
        $seed_en = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

        return substr(str_shuffle(str_repeat($seed_en,100)),0,100);
    }
}