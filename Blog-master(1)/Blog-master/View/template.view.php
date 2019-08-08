<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scal=1">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


  <?php
  include_once 'model/connexion.model.php';?>
<script src="https://cdn.tiny.cloud/1/xtv8s8afkquurwy3sizu945ysf5jhk46ydus6qkxs5ep51kl/tinymce/5/tinymce.min.js"></script>
  <script>tinymce.init({selector:'textarea'});</script>

  <link href="https://fonts.googleapis.com/css?family=Special+Elite&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.12.3.min.js" integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ=" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="css/blog.css">
  <link rel="stylesheet" href="css/bibliotheque_UX.css">


</head>


<body>
            <?= $content_invite_admin; ?>     

<div class="bloc_principal">
        <div class="bloc_header isRound d-flex justify-content-center align-item-center align-content-center hidden">

              <div class='nom_artiste '><h1> Blog de Jean Forteroche</h1></div>
                  <img src="images/image_SF.jpg"/></div>

<div class="navig">
  <nav class="navbar navbar-expand-md navbar-light bg-light justify-content-around"> 
      <ul class="navbar-nav"><div class="row">
 <div class="col-sm-4"><li class="nav-item"> <a href="index.php" class ='nav-link' >index</a></li></div>
   <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Chapitre
          </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
         <?php
foreach($posts_datas as $posts_data){
    $titre_extrait= $bdd_data->extrait($posts_data["title"], 4 );
  ?>

   <a class="dropdown-item" href="index.php?action=montrer_chapitre&id=<?php echo $posts_data["id"] ?>"><?php echo $titre_extrait.'[...]' ?></a> 
   <?php } ?>        
        </div>
      </li>
      
  <?php

if (isset($_SESSION['admin'])){
           ?>
<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">plus</a>
<div class="dropdown-menu" aria-labelledby="navbarDropdown2">
<a href="index.php?action=montrer_ecriture" class="dropdown-item">Creation</a>
  <?php
foreach ($additions as $addition) {
?>
<a href="index.php?action=montrer_signal" class="dropdown-item">signal(<?php echo $addition["SUM(signalement)"]?>) </a>
<?php } ?>
  <a href="index.php?action=deco" class="dropdown-item">deconnexion</a></li>
  <?php }else{ ?>
       <div class="col-sm-4"><li class="nav-item"><a href="index.php?action=montrer_admin" class ='nav-link'>Admin</a></li></div>
    <?php }?>
    </div>  
  </nav>

<div class='big_box bloc6'>
  <div class=" bloc-gauche">
    <div class="nav flex-column  isRound  container_chapitre isFade">
      <div class="band isLightBlue  isRound d-flex justify-content-center align-content-center align-item-center"><h2>Chapitre</h2></div>
      <div class="canScroll d-flex justify-content-center align-content-center align-item-center column">
      <?php
      foreach($posts_datas as $posts_data){
        ?>
     <a href="index.php?action=montrer_chapitre&id=<?php echo $posts_data["id"]?>" class="nav-link2" ><h3><?php echo $posts_data["title"] ?></h3></a>
     <form action='index.php?action=montrer_ecriture' method='POST'>
      <input name="idk" type="hidden" value="<?php echo $posts_data['id'] ?>"/>
      <?php  if (isset($_SESSION['admin'])){ ?>
      <button name='supprimer_chapitre' value='supprimer'>Supprimer</button>
         <a href=index.php?action=modification&id_chapitre=<?php echo $posts_data["id"] ?> class="bouton">modifier</a></form>
       <?php } else { ?>
        </form>
        <?php
        }
      }
?>
    </div>
    </div>
    </div>
    <div class="container_text marge2">

      <ul class="plusmenu">

          <?= $content_body; ?>     
        </div></div></div> 

      </body>

      </html>