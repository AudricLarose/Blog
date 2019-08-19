
<div class="bar_menu">
  <a href="index.php" class ='liens' >index</a>
  <a href="page.view.php" class ='liens'>chapitres</a>
  <?php  
if (isset($_SESSION['admin'])){
echo'  <a href="ecriture.view.php" class ="liens">créer un chapitre</a>';
echo'  <a href="signal.view.php" class ="liens">signalement</a>';
echo'  <a href="view.model.php?state=deco" class ="liens">se deconnecter</a>';

    }?>
    </div>  

 <form action='view.model.php' method="POST">
  <p> Aller au chapitre :</p><input type="number" name="recherche" class='input_recherche' min="1" max="99" required="required" />
  <button type="submit" name='chercher' > rechercher chapitre</button>
</form>
