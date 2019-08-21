<?php
namespace controller ;

class Body_controller {
    public function body($content_body, $content_onglet_titre)
    {
        $session=sessionactive();
        if ($session=='ok') {
            $content_invite_admin='  Bonjour, Monsieur Forteroche.';
        } else {
            $content_invite_admin='  Bonjour, invité.';
        }
        $bdd_data= new \model\Affichage();
        $posts_datas=$bdd_data->spot('posts4');
        $additions=$bdd_data->addition('signalement', 'commentaire');
        require "View/template.view.php";
    }
}
