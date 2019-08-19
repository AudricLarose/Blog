<?php
class Initial_controller 
{ 
  public function init (){
   if (isset($_POST['commentaire'])){
    $action =new affichage;
    $action->commentaire();
  }  
  if (isset($_POST['supprimer'])){
    $action =new commande;
    $action->supprimer();}

    if (isset($_POST['modifier'])){
      $paragraphe=new commande;
      $paragraphe->transforme();
    }
    if (isset($_POST['signaler'])){
      $paragraphe=new commande;
      $paragraphe->signale();
    }

    if (isset($_POST['new_chapitre'])){
      $action =new commande;
      $action->ajouter ('posts4');    

    } 
    if (isset($_POST['sauvegarde'])){
      $action =new commande;
      if (isset($_POST['id'])){
        var_dump($_POST['id']);
      }
      $titre =$_POST['titre_admin'];
      $action->ajouter('brouillon');


    }   
    if (isset($_POST['supprimer_brouillon'])){
      $paragraphe=new commande;
      $paragraphe->supprimer('brouillon');
    }
    if (isset($_POST['supprimer_chapitre'])){
      $paragraphe=new commande;
      $paragraphe->supprimer('posts4');
    }

    if (isset($_POST['reset'])){
      header('location:index.php?action=montrer_ecriture&id=0');
    }

    if (isset($_POST['supprimer_comment'])){
      $paragraphe=new commande;
      $paragraphe->supprimer('commentaire');
    }


    if (isset($_POST['inscription'])){
      $paragraphe=new affichage;
      $paragraphe->login();
    }


    if (isset($_POST['tentative'])){
      $passwordcheck=new affichage;
      $passwordcheck->verifie();

      
    }

    if (isset($_POST['chercher'])){
      $paragraphe=new affichage;
      $paragraphe->recherche();
    }
    if (isset($_POST['takemail'])){
      $paragraphe=new affichage;
      $paragraphe->mailing();
    }

    if (isset($_POST['compter'])){
      $paragraphe=new affichage;
      $paragraphe->compte();
    }}}