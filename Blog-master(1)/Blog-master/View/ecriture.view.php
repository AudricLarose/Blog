	<?php ob_start();?>

 <?php  ?>

          <div class='isBlue' ><?= $content_feedback; ?> </div>    


  <form action="index.php?action=montrer_ecriture" method="POST">
<input type="text" name="titre_admin" value="<?php echo $xt; ?>"/>  <br>
<textarea name="texte_admin"  cols="70" rows="20">
<?php echo $xb;?>
</textarea>

<br/>
<br><br>

  <button name="new_chapitre" value="Nouveau chapitre">mettre en ligne</button>
  <button name="sauvegarde" value="Sauvegarde">Sauvegarde</button>
  <button name="reset" value="reset">reset</button>
</form>

          <?= $content_brouillon; ?>     

</div>

	<?php $content=ob_get_clean();?>
