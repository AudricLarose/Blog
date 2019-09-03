<?php
namespace controller;

class Signal_controller
{
    public function signal($success)
    {
        switch ($success) {
            case 'supprimer':
                $content_feedback= 'La suppression a bien été effectué';
                break;
            case ' ':
                $content_feedback= " ";
                break;
            default:
                $content_feedback= " ";
                break;
        }
        $content_onglet_titre="Signal";
        $sessions=new \outils\Tools();
        $session=$sessions->sessionactive();
        if ($session=='ok') {
            $comment= new \model\Comments_Manager();
            $table=$comment->getComment();
            var_dump($table);
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
