<?php ob_start();?>
<div class='isBlue'>
    <?= $content_feedback;?>
</div>
<form action="index.php?action=montrer_ecriture" method="POST"> Titre de la publication:
    <br>
    <input type="text" name="titre_admin" value="<?php echo $xt; ?>" />
    <br> Votre publication:
    <br>
    <textarea name="texte_admin" cols="70" rows="20" id="textarea">
        <?php echo $xb;?>
    </textarea>
    <br />
    <br>
    <br>
    <button name="new_chapitre" value="Nouveau chapitre">mettre en ligne</button>
    <button name="sauvegarde" value="Sauvegarde">Sauvegarde</button>
    <button name="reset" value="reset">reset</button>
</form>
<?= $content_brouillon;?>
<?php $content=ob_get_clean();?>