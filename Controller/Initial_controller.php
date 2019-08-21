<?php
namespace controller ;

class Initial_controller { 
    public function init()
    {
        if (isset($_POST['commentaire'])) {
            $action =new \model\Affichage();
            $action->commentaire();
        }  
        if (isset($_POST['supprimer'])) {
            $action =new \model\Commande();
            $action->supprimer();
        }
        if (isset($_POST['modifier'])) {
            $paragraphe=new \model\Commande();
            $paragraphe->transforme();
        }
        if (isset($_POST['signaler'])) {
            $paragraphe=new \model\Commande();
            $paragraphe->signale();
        }
        if (isset($_POST['new_chapitre'])) {
            $action =new \model\Commande();
            $action->ajouter ('posts4');    
        } 
        if (isset($_POST['sauvegarde'])) {
            $action =new \model\Commande();
            $titre =$_POST['titre_admin'];
            $action->ajouter('brouillon');
        }   
        if (isset($_POST['supprimer_brouillon'])) {
            $paragraphe=new \model\Commande();
            $paragraphe->supprimer('brouillon');
        }
        if (isset($_POST['supprimer_chapitre'])) {
            $paragraphe=new \model\Commande();
            $paragraphe->supprimer('posts4');
        }
        if (isset($_POST['reset'])) {
            header('location:index.php?action=montrer_ecriture&id=0');
        }
        if (isset($_POST['supprimer_comment'])) {
            $paragraphe=new \model\Commande();
            $paragraphe->supprimer('commentaire');
        }
        if (isset($_POST['inscription'])) {
            $paragraphe=new \model\Affichage();
            $paragraphe->login();
        }    
        if (isset($_POST['tentative'])) {
            $passwordcheck=new \model\Affichage();
            $passwordcheck->verifie();
        }
        if (isset($_POST['chercher'])) {
            $paragraphe=new \model\Affichage();
            $paragraphe->recherche();
        }
        if (isset($_POST['takemail'])) {
            $paragraphe=new \model\Affichage();
            $paragraphe->mailing();
        }
        if (isset($_POST['compter'])) {
            $paragraphe=new \model\Affichage();
            $paragraphe->compte();
        }
    }
}