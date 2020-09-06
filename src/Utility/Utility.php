<?php


namespace Bitm\Utility;


class Utility
{
    public static function d($var){
        echo "<pre>";
        print_r($var);
        echo "</pre>";
    }

    public static function dd($var){
        self::d($var);
        die();
    }
}