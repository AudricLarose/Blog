   <div class='big_box'>
    <div class="container_chapitre isbordered">
    <?php
$menus= new affichage;
$nav=$menus->spot('posts4');
foreach($nav as $navi){
 echo '<a href="index.php?action=montrer_chapitre&id='.$navi["id"].'"><h3>'.$navi["title"].'</h3></a>';   
 echo "<form action='index.php' method='POST'>";
 echo '<input name="idk" type="hidden" value="'.$navi['id'].'"/>';
 if (isset($_SESSION['admin'])){
 echo "<button name='supprimer_chapitre' value='supprimer'>Supprimer</button><br>";
 echo '<a href="ecriture.view.php?id_chapitre='.$navi["id"].'" class="bouton">modifier</a></form>';}
}

    ?>
 </div>
 <div class="container_text marge2 ">