	<?php ob_start();?>

<?php
foreach($posts_datas as $posts_data){
    $extrait= $bdd_data->extrait($posts_data["body"], 80 );
    ?>
    <div class="bloc_extrait_index ">
    <div class="bloc_titre isRound isLightBlue  d-flex justify-content-center align-item-center "><h2><?php echo $posts_data["title"] ?></h2></div>
    <div class="sous_bloc_date-text ">
    <div class="bloc_text  "><p><?php echo $extrait ?><a href="index.php?action=montrer_chapitre&id=<?php echo $posts_data["id"] ?>"><strong>... [Lire la suite ]</strong></a></p>
    </div></div></div> 
    <?php
} ?>
    ?>

	<?php $content=ob_get_clean();?>
