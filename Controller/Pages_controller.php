<?php
class Pages_controller 
{
    public function forme($x){
        $texte1=strtolower($x);
        $texte_mod=ucwords($texte1);
        return $texte_mod;
    }
    public function pages($error,$success){
        $content_onglet_titre="Chapitres";
        try {
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
            $menus= new affichage;
            $bloc_text_titres = $menus->lecture('posts4');
            if ($bloc_text_titres){
                $comment=new affichage;
                $commentaires= $comment->show_comment();
                $forme= new Pages_controller;
                require 'View/pagecom.view.php';
                $body= new Body_controller;
                $body->body($content,$content_onglet_titre);
            } else {
                throw new Exception("Impossible d'afficher la page car elle ne figure pas sur la base de données");
            }
        } catch (Exception $e){
            $content = $e->getMessage();
            $body= new Body_controller;
            $body->body($content,$content_onglet_titre);
         }
     }
 }