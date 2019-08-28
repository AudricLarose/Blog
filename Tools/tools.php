<?php
namespace outils ;
class Tools
{
    public function antidoublons($x, $y)
    {
        $data= new \model\Posts_Manager();
        $recherche= $data->getPost($x);
        if (isset($recherche)) {
            foreach ($recherche as $recherches) {
                if (in_array($y, $recherches)) {
                    return true;
                    exit();
                }
            }
        }
    }
    public function extrait($x, $y)
    {
        $extr = explode(' ', "$x", $y);
        $extr[$y-1]=" ";
        $extrait=implode(" ", $extr);
        return $extrait;
    }
    public function body($content_body, $content_onglet_titre)
    {
        $sessions= new \outils\Tools();
        $session=$sessions->sessionactive();
        if ($session=='ok') {
            $content_invite_admin='  Bonjour, Monsieur Forteroche.';
        } else {
            $content_invite_admin='  Bonjour, invité.';
        }
        $bdd_data= new \model\Posts_Manager();
        $posts_datas=$bdd_data->getPost('posts4');
        $bdd_data_comment= new \model\Comments_Manager();
        $additions=$bdd_data_comment->additionCommentSignal('signalement');
        $Get_Extrait= new \outils\Tools();
        require "View/template.view.php";
    }
    public function sessionactive() 
    {
        if (isset($_SESSION['admin'])) {
            if ($_SESSION['admin']=='ok') {
                $session='ok';
                return $session;
            }
        }
    }
    public function forme($x)
    {
        $texte1=strtolower($x);
        $texte_mod=ucwords($texte1);
        return $texte_mod;
    }
    public function init()
    {
        if (isset($_POST['commentaire'])) {
            $action =new \model\Comments_Manager();
            $action->commenter();
        }
        // if (isset($_POST['supprimer'])) {
        //     $action =new \model\Commande();
        //     $action->supprimer_comm();
        // }
        // if (isset($_POST['modifier'])) {
        //     $paragraphe=new \model\Commande();
        //     $paragraphe->transforme();
        // }
        if (isset($_POST['signaler'])) {
            $paragraphe=new \model\Comments_Manager();
            $paragraphe->signalerComment();
        }
        if (isset($_POST['new_chapitre'])) {
            $action =new \model\Posts_Manager();
            $action->ajouterPost('posts4');
        }
        if (isset($_POST['sauvegarde'])) {
            $action =new \model\Posts_Manager();
            $titre =$_POST['titre_admin'];
            $action->ajouterPost('brouillon');
        }
        if (isset($_POST['supprimer_brouillon'])) {
            $paragraphe=new \model\Posts_Manager();
            $paragraphe->supprimerPost('brouillon');
        }
        if (isset($_POST['supprimer_chapitre'])) {
            $paragraphe=new \model\Posts_Manager();
            $paragraphe->supprimerPost('posts4');
        }
        if (isset($_POST['reset'])) {
            header('location:index.php?action=montrer_ecriture&id=0');
        }
        if (isset($_POST['supprimer_comment'])) {
            $paragraphe=new \model\Comments_Manager();
            $paragraphe->supprimerComment();
        }
        if (isset($_POST['inscription'])) {
            $paragraphe=new \model\Users_Manager();
            $paragraphe->login();
        }
        if (isset($_POST['tentative'])) {
            $passwordcheck=new \model\Users_Manager();
            $passwordcheck->verifie();
        }
        // if (isset($_POST['chercher'])) {
        //     $paragraphe=new \model\Affichage();
        //     $paragraphe->recherche();
        // }
        // if (isset($_POST['takemail'])) {
        //     $paragraphe=new \model\Affichage();
        //     $paragraphe->mailing();
        // }
        // if (isset($_POST['compter'])) {
        //     $paragraphe=new \model\Affichage();
        //     $paragraphe->compte();
        // }
    }
}
