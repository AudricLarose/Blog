
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
     <div class="bloc_header "></div>
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
  <div class="show_comment"> Pas de commmentaire , soyez le premier a réagir !

<form action='view.model.php' method="POST">

    <?php
$comment=new affichage;
$commentaire= $comment->show_comment();
$ide=$_GET['id'];
foreach ($commentaire as $commentaires) {
  $nom=$commentaires['auteur'];
  $auteur=$comment->forme($nom);
    echo '<br> <div class="auteur"><strong>'.$auteur.'</strong></div>';
  echo '<div class="date">'.$commentaires['date'].'</div>';
  echo '<div class="conversa">'.$commentaires['commentaire'].'</div>';
 echo '<input name="idk" type="hidden" value="'.$ide.'"/>';
echo' <button type="submit" name="supprimer">supprimer</button>';
}
    ?>
  </div>

</div>
<input type="text" name="nom"></input>
<input type="text" name="email"></imput>
<textarea name="commentairer"  cols="100" rows="5" class='comment' placeholder="Tapez votre commentaire"></textarea><br />
<button type="submit" name="commentaire">commenter</button></form>
</div>
</div>

<div class="bar_footer"></div> 
  </div>
</body>

</html>