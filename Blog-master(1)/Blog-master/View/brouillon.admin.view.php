    <?php ob_start();?>
    <br>
    <h2 class="center">Brouillon</h2>

  <div class='brouillon_side d-flex row width-60 canScroll'>

  <?php 
 foreach ($brouillon as $brouillons) {
 	?>
 	<div class="width-auto d-flex column brouillon_option">
 <a href="index.php?action=modification&id=<?= $brouillons['id'] ?>"><h3><?= $brouillons['title'] ?></h3></a> 
<form action='index.php?action=montrer_ecriture' method='POST'>
<input name="idk" type="hidden" value="<?= $brouillons['id']?>"/>
<button name='supprimer_brouillon' class ='suppression' value='supprimer'>Supprimer</button></form></div>
<?php }  ?>
</div>
	<?php $content_brouillon=ob_get_clean();?>

