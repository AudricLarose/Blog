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

<!-- <div class="invisibleJS"> -->
  <nav class="navbar navbar-expand-md navbar-light bg-light justify-content-around"> 
      <ul class="navbar-nav"><div class="row">
 <div class="col-sm-4"><li class="nav-item"> <a href="index.php" class ='nav-link' >index</a></li></div>
   <div class="col-sm-4"><li class="nav-item"><a href="index.php?action=montrer_chapitre&id=1" class ='nav-link'>chapitres</a></li></div>
       <div class="col-sm-4"><li class="nav-item"><a href="index.php?action=montrer_admin&id=1" class ='nav-link'>Admin</a></li></div>
  </nav>
  <!-- ul class="kk"> -->
<!--     <?php
$menus= new affichage;
$nav=$menus->spot('posts4');
foreach($nav as $navi){
   echo '<li><a href="index.php?action=montrer_chapitre&id='.$navi["id"].'">'.$navi["title"].'</a></li>';  
  }
    ?> -->

<!--   </ul>
  </li>
</ul>  -->

  <?php  
 $sum=new affichage;
 $addition=$sum->addition('signalement','commentaire');
if (isset($_SESSION['admin'])){
  echo '<ul><li class="nav-item plus"><a href="#">plus</a><ul class="plus_lmenu">';
echo'  <li><a href="ecriture.view.php?" class ="liens">créer un chapitre</a></li>';
foreach ($addition as $additions) {
echo'  <li><a href="signal.view.php" class ="liens">signalement ('.$additions["SUM(signalement)"].') </a><li>';}
echo'  <li><a href="index.php?state=deco" class ="liens">se deconnecter</a></li></ul></li></ul>';


    }else{?>
<!--     </ul> -->


    <?php }?>
    </div>  

 <form action='index.php' method="POST">
  <p> Aller au chapitre :</p><input type="number" name="recherche" class='input_recherche' min="1" max="99" required="required" />
  <button type="submit" name='chercher' > rechercher chapitre</button>
</form>
 
  <div class='big_box'>
    <div class="nav flex-column container_chapitre ">
      <?php
      foreach($affiche as $affiches){
       echo '<a href="index.php?action=montrer_chapitre&id='.$affiches["id"].'class="nav-link" ><h3>'.$affiches["title"].'</h3></a> ';   
       echo "<form action='index.php?action=montrer_ecriture' method='POST'>";
       echo '<input name="idk" type="hidden" value="'.$affiches['id'].'"/>';
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

          <?= $content_body; ?>     
        </div></div>        </div>  

        <script src="test.js"></script>

      </body>

      </html>