	<?php ob_start();?>

<div class='resultat'>
	<?php
foreach ($actions as $action) {
	?>
	<div class="phrase"> comme un <?= $action['Type_1']; ?> , <?=  $action['Question_1']; ?> <br> ou comme un <?=  $action['Type_2']; ?> , <?=  $action['Question_2']; ?>	 
</div>
<br>
<br>
<?php } ?>

	<?php $content_body=ob_get_clean();?>

