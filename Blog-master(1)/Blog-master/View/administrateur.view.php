
	<?php ob_start();?>

	          <div class="isRedBcg"><?= $content_admin; ?></div>
	          <br>
<form action='index.php' method="POST" >
Nom de l'administrateur : <input type="text" name="nom" required="required" /><br>
mot de passe  : <input type="password" name="password" required="required" /><br>
<button type='submit' name='tentative'>se connecter</button><br>
</form>

	<?php $content=ob_get_clean();?>

