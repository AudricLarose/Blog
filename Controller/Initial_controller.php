<?php
namespace controller ;

require './Model/Posts_Manager.php';
require './Model/Comments_Manager.php';
require './Model/Users_Manager.php';
require './Model/Entity_Post_Model.php';


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
        var_dump($posts_datas);
        $Get_Extrait= new \outils\Tools();
        require 'View/accueil.view.php';
        $insertion_template=new \outils\Tools();
        $insertion_template->body($content, $content_onglet_titre);
    }

}
