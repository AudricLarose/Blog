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

        <div class="bloc_header ">
          <div class='bandereau'>
            <div class='rect_noir'>
              <div class='nom_artiste'><h2> BLOG DE L'ECRIVAIN</h2></div>
            </div>
          </div>
        </div>

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="index.php">index</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        <li class=" nav-item active menu">
          <a class="nav-link" href="index.php?action=montrer_chapitre&id=1">chapitre<span class="sr-only">(current)</span></a>
        </li>
      </ul>
    </div>
  </nav>

  <div class='big_box'>
    <div class="container_chapitre isbordered">
      <?php
      foreach($affiche as $affiches){
       echo '<a href="index.php?action=montrer_chapitre&id='.$affiches["id"].'"><h3>'.$affiches["title"].'</h3></a>';   
       echo "<form action='index.php?action=montrer_ecriture' method='POST'>";
       echo '<input name="idk" type="hidden" value="'.$affiches['id'].'"/>';
       var_dump($_SESSION);
       if (isset($_SESSION['admin'])){
         echo "<button name='supprimer_chapitre' value='supprimer'>Supprimer</button><br>";
         echo '<a href=index.php?action=modification&id_chapitre='.$affiches["id"].'" class="bouton">modifier</a></form>';
       } else {
          echo "</form>";
        }
      }

      ?>
    </div>
    <div class="container_text marge2 ">

      <ul class="plusmenu">

        <?php 
        if (isset($session)){
          echo "session existe";
          if ($session=='ok'){
            echo '<ul><li class="plus"><a href="#">plus</a><ul class="plus_menu">';
            echo'  <li><a href="index.php?action=montrer_ecriture" class ="liens">créer un chapitre</a></li>';
            foreach ($addition as $additions) {
              echo'  <li><a href="index.php?action=montrer_signal" class ="liens">signalement ('.$additions["SUM(signalement)"].') </a><li>';
            }
              echo'  <li><a href="index.php?action=deco" class ="liens">se deconnecter</a></li></ul></li></ul>';


            }}else{?>
            </ul><a href="index.php?action=montrer_admin" class ='liens'>admin</a>

          <?php }?>
        </div>  

        <form action='index.php?action=verifie' method="POST">
          <p> Aller au chapitre :</p><input type="number" name="recherche" class='input_recherche' min="1" max="99" required="required" />
          <button type="submit" name='chercher' > rechercher chapitre</button>
        </form>



        <H2> voici ma template !! </h2>
          <?= $content_body; ?>     
        </div></div>
        <script src="test.js"></script>

      </body>

      </html>