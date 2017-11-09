<?php
class dBHelper
{
    public static function createConnection(){
        $pdo = new pdo ('mysql:host=localhost; dbname=book','root', "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}


?>