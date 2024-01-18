<?php
/**
 * Conforama-restaurant
 * @author Fabian Doizi
 */

include_once 'APIController.php';

class opinionesController
{
    public function index()
    {
        include_once 'view/nav.php';
        include_once 'view/opinionesView.php';
        include_once 'view/footer.php';
    }
}