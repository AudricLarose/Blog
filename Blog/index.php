
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
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
    <link rel="stylesheet" href="css/blog.css">

</head>


<body>
    <div class="bloc_header "></div>
<div class="bar_menu ">

</div>
<div class='big_box'>
 <?php include_once 'side_menu.view.php';?>


<div class="container_text marge1 ">
<?php
$affichaged= new affichage;
$affiche=$affichaged->spot();
foreach($affiche as $affiches){
    $extrait=$affichaged->extrait($affiches["body"], 200 );
  echo '<div class="bloc_extrait_index  ">';
      echo ' <div class="bloc_titre  "><h2>'.$affiches["title"].'</h2></div>';
       echo '<div class="sous_bloc_date-text  ">';
         // echo '  <div class="bloc_date  ">'.$affiches["date"].'</div> ';
           echo '  <div class="bloc_text  "><p>'.$extrait.'<a href="page.view.php?id='.$affiches["id"].'"><strong>... [Lire la suite ]</strong></a></p>';
          echo '   </div></div></div> ';

}
    ?>
</div></div>

          <div class="bar_footer  "></div> 


</body>

</html>