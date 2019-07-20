
   <?php include_once 'container_chapitre_text.view.php';?>
   <?php include_once 'show_comment.view.php';?>


<div class='formulaire'>
<form action='index.php' method='POST'>
  <input name="idk" type="hidden" value=' <?php echo($_GET["id"])?>'/>
<input type="text" name="nom" placeholder="Nom" required="required"></input><br><br>
<input type="text" name="email" placeholder="email" required="required"></imput><br><br>
<textarea name="commentairer"  cols="70" rows="5" class='comment' placeholder="Tapez votre commentaire" required="required"></textarea><br /><br>
<?php 
if (isset($_GET['erreur'])){echo $erreur;} ?>
<button type="submit" name="commentaire">commenter</button><br>
</div>
</div>

</div>
