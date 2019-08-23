
<?php 
 $validation=$_GET;
?>

    <div class="bloc_header "></div>
<?php include_once 'bar_menu.view.php';?>

<div class='big_box'>
 <?php include_once 'side_menu.view.php';?>



<div class="container_text marge1 ">
<?php
$affichaged= new affichage;
$affiche=$affichaged->spot('posts4');
foreach($affiche as $affiches){
    $extrait=$affichaged->extrait($affiches["body"], 200 );
  echo '<div class="bloc_extrait_index  ">';
      echo ' <div class="bloc_titre "><h2>'.$affiches["title"].'</h2></div>';
       echo '<div class="sous_bloc_date-text  ">';
         // echo '  <div class="bloc_date  ">'.$affiches["date"].'</div> ';
           echo '  <div class="bloc_text  "><p>'.$extrait.'<a href="page.view.php?id='.$affiches["id"].'"><strong>... [Lire la suite ]</strong></a></p>';
          echo '   </div></div></div> ';

}
    ?>
</div></div>

