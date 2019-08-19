  <div class='brouillon_side isbordered'>

    <h2>Brouillon</h2>
  <?php 
    $brouill= new affichage;
$brouillon=$brouill->spot('brouillon');
if (isset($brouillon)){
 foreach ($brouillon as $brouillons) {
 echo '<a href="ecriture.view.php?id='.$brouillons["id"].'"><h3>'.$brouillons['title'].'</h3></a>'; 
 echo "<form action='view.model.php' method='POST'>";
 echo '<input name="idk" type="hidden" value="'.$brouillons['id'].'"/>';
 echo "<button name='supprimer_brouillon' value='supprimer'>Supprimer</button></form>";
 }
}

  ?>
