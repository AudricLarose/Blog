<?php
namespace controller;

class Signal_controller
{
    public function signal()
    {
        $content_onglet_titre="Signal";
        $session=sessionactive();
        if ($session=='ok') {
            $comment= new \model\Affichage();
            $table=$comment->spot_comment();
            if (!empty($table)) {
                require 'View/signal.view.php';
            } else {
                $content="Vous n'avez pas encore de commentaires !";
            }
        } else {
            require 'View/erreur_404.php';
        }
        $body= new Body_controller;
        $body->body($content, $content_onglet_titre);
    }
}
