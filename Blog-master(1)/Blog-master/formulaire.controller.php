
<?php
include_once 'view.model.php';

 if (isset($_POST['commentaire'])){
  $action =new affichage;
  $action->commentaire();
}  
if (isset($_POST['supprimer'])){
  $action =new affichage;
  $action->supprimer();

}  
if (isset($_POST['maj'])){ 
$paragraphe = new affichage;
$magie=$paragraphe->modifier();
$bodys=$magie[0]['commentaire'];
$id=$magie[0]['id'];
echo "<form action='index.php?action=verifie' method='post'>
<select name='id' id=''><br /><option name='id' value='$id' >$id</option></select><textarea name='body' cols='30' rows='10'>$bodys</textarea><br /> <button type='submit' name='modifier'>affichageer</button>
</form>";
}
if (isset($_POST['modifier'])){
  $paragraphe=new affichage;
  $paragraphe->transforme();
}
if (isset($_POST['signaler'])){
  $paragraphe=new affichage;
  $paragraphe->signale();
}

if (isset($_POST['new_chapitre'])){
  $action =new affichage;
  $action->ajouter ('posts4');    

} 
if (isset($_POST['sauvegarde'])){
  $action =new affichage;
    $titre =$_POST['titre_admin'];
  $action->ajouter('brouillon');
}   
if (isset($_POST['supprimer_brouillon'])){
  $paragraphe=new affichage;
  $paragraphe->supprimer('brouillon');
header('location:ecriture.view.php?id=0');

}
if (isset($_POST['supprimer_chapitre'])){
  $paragraphe=new affichage;
  $paragraphe->supprimer('posts4');
}
if (isset($_POST['modifier_chapitre'])){
  
}

if (isset($_POST['reset'])){
  header('location:ecriture.view.php?id=0');
}

if (isset($_POST['supprimer_comment'])){
    $paragraphe=new affichage;
  $paragraphe->supprimer('commentaire');
}


if (isset($_POST['inscription'])){
  $paragraphe=new affichage;
  $paragraphe->login();
}


if (isset($_POST['tentative'])){
  $passwordcheck=new affichage;
  $passwordcheck->verifie();
  header('location:index.php');

  
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
}