<?php
namespace Bitm\Db;
use PDO;
 class Db
{
 public static $servername = "localhost";
 public static $username = "root";
 public static $password = "";
 public static $dbname = "phpcrud";




static function connect(){

    $conn = new PDO("mysql:host=".self::$servername.";dbname=".self::$dbname, self::$username, self::$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;

}

// note for learning 
//  Db must be static class need to use PDO. PDO is a global class 
// if Dont use it give e backslesh before PDO exp: \PDO
}