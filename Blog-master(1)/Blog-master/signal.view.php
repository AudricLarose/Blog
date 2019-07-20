
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
    <link href="https://fonts.googleapis.com/css?family=Special+Elite&display=swap" rel="stylesheet">
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
<?php include_once 'bar_menu.view.php';?>
<div class='big_box'><?php include_once 'side_menu.view.php';?>
<div class="container_text marge2">
<h1> Signalements</h1>
<table>
  <tr>
    <th>id</th>
    <th>message</th>
    <th>nombre de signalement</th>
    <th>options</th>
</tr>
<?php 
$comment= new affichage();
$table=$comment->spot_comment ();
foreach ($table as $tables) {
 ?>
    <tr>
      <td><?php echo $tables['id'] ;?></td>
      <td><?php echo $tables['commentaire'] ;?></td>
      <td><?php echo $tables['signalement'] ;?></td>
      <td><?php echo '<form action="index.php " method="POST">';
       echo '<input name="idk" type="hidden" value="'.$tables['id'].'"/>';
      echo "<button name='supprimer_comment' value='supprimer commentaire'>supprimer</button></form>"; ?></td>
    </tr>
<?php } ?>
</table>

  <div class='texte_colonne'></div></div></div>

</div>
<div class="bar_footer"></div> 
  </div>
  <script type="text/javascript" src="test.js"></script>

</body>

</html>