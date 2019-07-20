
<?php include_once 'view.model.php';?>
<?php include_once 'entete.view.php';?>
<?php include_once 'bar_menu.view.php';?>
<?php include_once 'side_menu.view.php';
if (isset($_GET['action'])){       
  $action=$_GET['action'];
  $id=$_GET['id'];
  switch ($action) {
    case 'montrer_chapitre':
    {
    include_once 'page.view.php';
      break;
    }
      case 'montrer_admin':{
 
    include_once 'administrateur.controller.php';
         break;
  }

      case 'montrer_chapitre':{
      break;

  }
      case 'montrer_chapitre':{
      break;

  }
      case 'montrer_chapitre':{
      break;

  }

}} else  {
include_once 'accueil.view.php'; }

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
echo "<form action='view.model.php' method='post'>
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
header('location:ecriture.view.php?id=0');
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
  $paragraphe=new affichage;
  $paragraphe->verifie();
}


if (isset($_GET['state'])){
  $paragraphe=new affichage;
  $paragraphe->deco();}


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
include_once 'footer.view.php'; 
