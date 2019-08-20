<?php
namespace controller;

class Deconnecte_controller
{
    public function deconnecte()
    {
        $_SESSION['admin']= array();
        session_destroy();
        header('location:index.php');
    }
}
