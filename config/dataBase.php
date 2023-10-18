<?php

class DataBase
{
    public static function connect($host='localhost', $user='root', $pass='', $db='conforama_restaurant')
    {
        $conn = new mysqli($host , $user, $pass, $db);

        if($conn->connect_error)
        {
            die("[ERROR] Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }
}