<?php

class APIController
{
    public function index()
    {
        $conn = DataBase::connect();
        $sql = $conn->prepare("SELECT * FROM opiniones");
        $sql->execute();

        echo json_encode($sql, JSON_UNESCAPED_UNICODE);
        return;
    }
}
