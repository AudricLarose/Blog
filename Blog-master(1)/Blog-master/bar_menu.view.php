
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="index.php">index</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class=" nav-item active menu">
        <a class="nav-link" href="index.php?action=montrer_chapitre&id=1">chapitre<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
    </ul>
  </div>
</nav>



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
