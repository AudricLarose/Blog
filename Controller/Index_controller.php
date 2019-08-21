<?php
namespace controller;

class Index_controller
{
    public function index()
    {
        $content_onglet_titre="Index";
        $bdd_data= new \model\Affichage();
        $posts_datas=$bdd_data->spot('posts4');
        require 'View/accueil.view.php';
        $body= new Body_controller;
        $body->body($content, $content_onglet_titre);
    }
}
