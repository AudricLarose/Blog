<?php
namespace controller ;

require './Model/Posts_Manager.php';
require './Model/Comments_Manager.php';
require './Model/Users_Manager.php';

class Initial_controller
{
    
    public function deconnecte()
    {
        $_SESSION['admin']= array();
        session_destroy();
        header('location:index.php');
    }
    public function index()
    {
        $content_onglet_titre="Index";
        $bdd_data= new \model\Posts_Manager();
        $posts_datas=$bdd_data->getPost('posts4');
        $xtrait= new \outils\Tools();
        require 'View/accueil.view.php';
        $body=new \outils\Tools();
        $body->body($content, $content_onglet_titre);
    }

}
