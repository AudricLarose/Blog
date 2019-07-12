    <div class="container_chapitre isbordered">
    <?php
$menus= new affichage;
$nav=$menus->spot('posts4');
foreach($nav as $navi){
 echo '<a href="page.view.php?id='.$navi["id"].'"><h3>'.$navi["title"].'</h3></a>';   
}

    ?>
 </div>