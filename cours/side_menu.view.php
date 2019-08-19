    <div class="container_chapitre isbordered">
    <?php
$menus= new affichage;
$nav=$menus->spot('posts4');
foreach($nav as $navi){
 echo '<a href="page.view.php?id='.$navi["id"].'"><h3>'.$navi["title"].'</h3></a>';   
 echo "<form action='view.model.php' method='POST'>";
 echo '<input name="idk" type="hidden" value="'.$navi['id'].'"/>';
 if (isset($_SESSION['admin'])){
 echo "<button name='supprimer_chapitre' value='supprimer'>Supprimer</button>";
 echo '<a href="ecriture.view.php?id_chapitre='.$navi["id"].'" class="bouton">modifier</a></form>';}
}

    ?>
 </div>