<?php
namespace controller;

class Pages_controller
{
    public function pages($error, $success)
    {
        $content_onglet_titre="Chapitres";
        try {
            if (!isset($_GET["id"])) {
            require 'View/erreur_404.php';
            $content_onglet_titre="erreur_404";
            $body= new \outils\Tools();
            $body->body($content,$content_onglet_titre);
            }
            $id=$_GET["id"];
            switch ($error) {
                case 'champs_vide':
                    $content_formu= " il faut remplir les champs avant de valider";
                    break;
                case ' ':
                    $content_formu= " ";
                    break;
            }
            switch ($success) {
                case 'valide':
                    $content_success= " Votre message a bien été validé";
                    break;
                case 'signaler':
                    $content_success= " Ce commentaire a bien été signalé";
                    break;
                case ' ':
                    $content_success= " ";
                    break;
            }
            $menus= new \model\Posts_Manager();
            $bloc_text_titres = $menus->lecturePost('posts4');
            if ($bloc_text_titres) {
                $comment=new \model\Comments_Manager();
                $commentaires= $comment->showComment();
                $forme= new \outils\Tools();
                var_dump($commentaires);
                require 'View/pagecom.view.php';
                $body= new \outils\Tools();
                $body->body($content, $content_onglet_titre);
            } else {
                throw new \Exception ("<br> Impossible d'afficher la page car elle ne figure pas sur la base de données");
            }
        } catch (\Exception $e) {
            $content = $e->getMessage();
            $body= new \outils\Tools();
            $body->body($content, $content_onglet_titre);
        }
    }
}
