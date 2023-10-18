<?php

class DataBase
{
    public static function connect($host='localhost', $user='root', $pass='', $db='conforama_restaurant')
    {
        $conn = new mysqli($host , $user, $pass, $db);

        if($conn == false)
        {
            die('CONECTION ERROR IN ' . $host . '/' . $db);
        }
    }
}