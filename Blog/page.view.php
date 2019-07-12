
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
<div class="bar_menu "></div>
<div class='big_box'>
   <?php include_once 'side_menu.view.php';?>

<div class="container_text marge2">
  <div class='texte_colonne'>
   <?php
    $show = new affichage;
$texto = $show->lecture();
    foreach($texto as $textos){
 echo $textos['body'] ;   
}
?>
</div>
<div class='comment'>
  <div class="show_comment">

    <?php
$comment=new affichage;
$commentaire= $comment->show_comment();
if (isset($_GET['id'])){
$ide=$_GET['id'];} else { header('location:index.php');}
if ($commentaire){
foreach ($commentaire as $commentaires) {
  $nom=$commentaires['auteur'];
  $auteur=$comment->forme($nom);
  echo "<form action='view.model.php' method='POST'>";
 echo '<br> <div class="auteur"><strong>'.$auteur.'</strong></div>';
  echo '<div class="date">'.$commentaires['date'].'</div>';
  echo '<div class="conversa">'.$commentaires['commentaire'].'</div>';
  if (isset($_SESSION['user'])){
  if ($commentaires['mail']==$_SESSION['user']){
    echo' <button type="submit" name="supprimer">supprimer</button>';
    echo' <button type="submit" name="maj">modifier</button>';


  }
}
$ide=intval($ide);
var_dump($ide);
echo' <button type="submit" name="signaler">signaler</button>';
 echo '<input name="idk" type="hidden" value="'.$commentaires['id'].'"/>';
 echo '<input name="idp" type="hidden" value="'.$ide.'"/></form>';
 

}} else {
  echo' Pas de commentaire, soyez le premier a vous exprimer !';
}
    ?>
  </div>

</div>
<div class='formulaire'>
<form action='view.model.php' method='POST'>
  <input name="idk" type="hidden" value=' <?php echo($_GET["id"])?>'/>
<input type="text" name="nom" placeholder="Nom"></input><br><br>
<input type="text" name="email" placeholder="email"></imput><br><br>
<textarea name="commentairer"  cols="70" rows="5" class='comment' placeholder="Tapez votre commentaire"></textarea><br /><br>
<?php 
if (isset($_GET['erreur'])){echo $erreur;} ?>
<button type="submit" name="commentaire">commenter</button><br>
</div>
</div>

</div>
<div class="bar_footer"></div> 
  </div>
</body>

</html>