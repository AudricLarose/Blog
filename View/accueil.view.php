<?php ob_start();
foreach ($posts_datas as $posts_data) {
    $extrait= $Get_Extrait->extrait($posts_data->getBody(), 80 );
    ?>
    <div class="bloc_extrait_index isRound ">
        <div class="bloc_titre isRound isLightBlue  d-flex justify-content-center align-item-center ">
            <h2><?php echo $posts_data->getTitle() ?></h2> </div>
        <div class="sous_bloc_date-text ">
            <div class="bloc_text  ">
                <p>
                    <?php echo $extrait ?><a href="index.php?action=montrer_chapitre&id=<?php echo $posts_data->getId() ?>"><strong>... [Lire la suite ]</strong></a></p>
            </div>
        </div>
    </div>
    <?php
}
$content=ob_get_clean();?>