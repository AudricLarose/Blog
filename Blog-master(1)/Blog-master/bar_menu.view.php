

<div class="bar_menu invisibleJS">
  <a href="index.php" class ='liens' >index</a>
  <ul>
  <li class="menu"><a href="index.php?action=montrer_chapitre&id=1" class ='lien'>chapitres</a>
  <ul class="sous_menu">
  	<?php

foreach($nav as $navi){
	 echo '<li><a href="index.php?action=montrer_chapitre&id='.$navi["id"].'">'.$navi["title"].'</a></li>';  
	}
	  ?>

  </ul>
  </li>
</ul>
<ul class="plusmenu">

  <?php 
  if (isset($session)){
echo "session existe";
if ($session=='ok'){
	echo '<ul><li class="plus"><a href="#">plus</a><ul class="plus_menu">';
echo'  <li><a href="index.php?action=montrer_ecriture" class ="liens">créer un chapitre</a></li>';
foreach ($addition as $additions) {
echo'  <li><a href="index.php?action=montrer_signal" class ="liens">signalement ('.$additions["SUM(signalement)"].') </a><li>';}
echo'  <li><a href="index.php?action=deco" class ="liens">se deconnecter</a></li></ul></li></ul>';


    }}else{?>
    </ul><a href="index.php?action=montrer_admin" class ='liens'>admin</a>

    <?php }?>
    </div>  

 <form action='index.php?action=verifie' method="POST">
  <p> Aller au chapitre :</p><input type="number" name="recherche" class='input_recherche' min="1" max="99" required="required" />
  <button type="submit" name='chercher' > rechercher chapitre</button>
</form>
