<?php


namespace Bitm\Utility;


class Message
{
    public static function get(){
        if(array_key_exists('message', $_SESSION) && !empty($_SESSION['message'])){
            $message = $_SESSION['message'];
            $_SESSION['message'] = '';
            return $message;
        }
    }

    public static function set($message){
        $_SESSION['message'] = $message;
    }
}