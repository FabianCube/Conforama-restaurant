<?php
include_once 'config/dataBase.php';

class ProductoDAO
{
    public static function getAllProducts()
    {
        $conn = DataBase::connect();
        
        if($select = $conn->query("SELECT * FROM productos"))
        {
            echo $select->get_rows();

        }
    }
}