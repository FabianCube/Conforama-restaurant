<?php

include_once 'model/Opiniones.php';

class APIController
{
    public function index()
    {
        $conn = DataBase::connect();
        $sql = $conn->prepare("SELECT * FROM opiniones");
        $sql->execute();
        $result = $sql->get_result();

        if ($result) {
            while ($opinion = $result->fetch_object('Opiniones')) {
                $opiniones[] = $opinion;
            }
        }

        echo json_encode($opiniones, JSON_UNESCAPED_UNICODE);
        return;
    }
}
