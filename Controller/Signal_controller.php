<?php
namespace controller;

class Signal_controller
{
    public function signal()
    {
        $content_onglet_titre="Signal";
        $sessions=new \outils\Tools();
        $session=$sessions->sessionactive();
        if ($session=='ok') {
            $comment= new \model\Comments_Manager();
            $table=$comment->getComment();
            if (!empty($table)) {
                require 'View/signal.view.php';
            } else {
                $content="Vous n'avez pas encore de commentaires !";
            }
        } else {
            require 'View/erreur_404.php';
        }
        $body= new \outils\Tools();
        $body->body($content, $content_onglet_titre);
    }
}
