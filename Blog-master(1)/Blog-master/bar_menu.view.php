

<div class="bar_menu invisibleJS">
  <a href="index.php" class ='liens' >index</a>
  <ul>
  <li class="menu"><a href="index.php?action=montrer_chapitre&id=1" class ='lien'>chapitres</a>
  <ul class="sous_menu">
  	<?php
$menus= new affichage;
$nav=$menus->spot('posts4');
foreach($nav as $navi){
	 echo '<li><a href="index.php?action=montrer_chapitre&id='.$navi["id"].'">'.$navi["title"].'</a></li>';  
	}
	  ?>

  </ul>
  </li>
</ul>
<ul class="plusmenu">

  <?php  
 $sum=new affichage;
 $addition=$sum->addition('signalement','commentaire');
if (isset($_SESSION['admin'])){
	echo '<ul><li class="plus"><a href="#">plus</a><ul class="plus_menu">';
echo'  <li><a href="ecriture.view.php?" class ="liens">créer un chapitre</a></li>';
foreach ($addition as $additions) {
echo'  <li><a href="signal.view.php" class ="liens">signalement ('.$additions["SUM(signalement)"].') </a><li>';}
echo'  <li><a href="index.php?state=deco" class ="liens">se deconnecter</a></li></ul></li></ul>';


    }else{?>
    </ul><a href="index.php?action=montrer_admin&id=1" class ='liens'>admin</a>

    <?php }?>
    </div>  

 <form action='index.php' method="POST">
  <p> Aller au chapitre :</p><input type="number" name="recherche" class='input_recherche' min="1" max="99" required="required" />
  <button type="submit" name='chercher' > rechercher chapitre</button>
</form>
