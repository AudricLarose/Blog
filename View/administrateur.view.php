<?php ob_start();?>
<div class="isRedBcg">
    <?= $content_admin; ?>
</div>
<br>
<div class="formulaire_admin">
    <form action='index.php' method="POST"> Nom de l'administrateur :
        <br>
        <input type="text" name="nom" required="required" />
        <br> mot de passe :
        <br>
        <input type="password" name="password" required="required" />
        <br>
        <button type='submit' name='tentative'>se connecter</button>
        <br> </form>
    </div>
<?php $content=ob_get_clean();?>