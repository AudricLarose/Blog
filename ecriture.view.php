
<?php 
 $validation=$_GET;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
 include_once 'connexion.model.php';
 include_once 'view.model.php';?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <script src="https://cdn.tiny.cloud/1/xtv8s8afkquurwy3sizu945ysf5jhk46ydus6qkxs5ep51kl/tinymce/5/tinymce.min.js"></script>

    <script src="https://code.jquery.com/jquery-1.12.3.min.js" integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
    <link rel="stylesheet" href="css/blog.css">

</head>


<body>
  <?php session_start() ?>
  <div class="bloc_header ">
  <div class='bandereau'>
    <div class='rect_noir'>
      <div class='nom_artiste'><h2> BLOG DE L'ECRIVAIN</h2></div>
    </div>
  </div>
     </div>
<div class="bar_menu">
  <a href="index.php" class ='liens' >index</a>
  <a href="page.view.php" class ='liens'>chapitres</a>
  <a href="ecriture.view.php" class ='liens'>créer un chapitre</a>
  <a href="signal.view.php" class ='liens'>signalement</a>
</div><div class='big_box'>

   <?php include_once 'side_menu.view.php';?>
<div class="container_text marge2">
  <div class='texte_colonne'>
   
</div> 
<?php 
if (isset($_GET['id'])){
$brouill= new affichage;
$brouillon=$brouill->lecture('brouillon');
 ?>
<form action="view.model.php " method="POST">
<input type="text" name="titre_admin" value="<?php 
echo $brouillon[0]['title']; ?>"/>  <br>

<textarea name="texte_admin"  cols="70" rows="20">
<?php 

echo $brouillon[0]['body'];
} else if (isset($_GET['id_chapitre'])) {
  $chapitre= new affichage;
$chapitres=$chapitre->lecture('posts4');
 ?>
<form action="view.model.php " method="POST">
<input type="text" name="titre_admin" value="<?php 
echo $chapitres[0]['title']; ?>"/>  <br>
<textarea name="texte_admin"  cols="150" rows="50">
<?php 

echo $chapitres[0]['body'];

} else {
  ?>
  <form action="view.model.php " method="POST">
<input type="text" name="titre_admin" value=" "/> <br>
<textarea name="texte_admin"  cols="70" rows="20"> 
<?php } ?>
</textarea><br/><br>
  <button name="new_chapitre" value="Nouveau chapitre">mettre en ligne</button>
  <button name="sauvegarde" value="Sauvegarde">Sauvegarde</button>
  <button name="reset" value="reset">reset</button>
</form>

<div class="bar_footer"></div> 
  </div>
<?php include_once 'brouillon.admin.view.php' ?>
</div>
</body>
</html>