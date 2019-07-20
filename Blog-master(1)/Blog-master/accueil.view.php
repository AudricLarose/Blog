

<?php
$affichaged= new affichage;
$affiche=$affichaged->spot('posts4');
foreach($affiche as $affiches){
    $extrait=$affichaged->extrait($affiches["body"], 80 );
  echo '<div class="bloc_extrait_index  ">';
      echo ' <div class="bloc_titre "><h2>'.$affiches["title"].'</h2></div>';
       echo '<div class="sous_bloc_date-text  ">';
         // echo '  <div class="bloc_date  ">'.$affiches["date"].'</div> ';
           echo '  <div class="bloc_text  "><p>'.$extrait.'<a href="index.php?action=montrer_chapitre&id='.$affiches["id"].'"><strong>... [Lire la suite ]</strong></a></p>';
          echo '   </div></div></div> ';


}
    ?>

