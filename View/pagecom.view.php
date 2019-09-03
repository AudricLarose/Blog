<?php ob_start();?>
    <br><br>
    <div class="isGreen">
        <?= $content_success; ?>
    </div><br><br>
    <h2 class='titre'>
    <?php echo $bloc_text_titres->getTitle();?>
    </h2>
    <div class='texte_colonne'>
    <?php echo $bloc_text_titres->getBody();?>
}
        ?>
    </div>
    <div class='comment'>
        <div class="show_comment">
            <?php
            if ($commentaires) {
                foreach ($commentaires as $commentaire) {
                    $nom=$commentaire['auteur'];
                    $auteur=$forme->forme($nom);
            ?>
                <form action='index.php' method='POST'><br>
                    <div class="auteur"><strong><?php echo  $auteur ?></strong>
                    </div>
                    <div class="date">
                        <?php echo $commentaire['date'] ?>
                    </div>
                    <div class="conversa">
                        <?php echo $commentaire['commentaire'] ?>
                    </div>
                    <input name="idke" type="hidden" value=' <?php echo $id ?>' ></input>
                    <button type="submit" name="signaler">signaler</button>
                    <input name="idk" type="hidden" value="<?php echo $commentaire['id'] ?>"></input>
                </form>
                <?php
                }
            } else {
                echo' Pas de commentaire, soyez le premier a vous exprimer !';
            }
            ?>
        </div>
    </div>
    <div class='formulaire'>
        <form action='index.php?action=montrer_chapitre' method='POST'>
            <div class="isRedBcg">
                <?= $content_formu; ?>
            </div><br>
            <input name="idk" type="hidden" value=' <?php echo $id ?>'/>
            <input type="text" name="nom" placeholder="Nom" required="required"/><br><br>
            <input type="text" name="email" placeholder="email" required="required"/><br><br>
            <textarea name="commentairer" cols="40" rows="5" class='comment' placeholder="Tapez votre commentaire"></textarea><br><br>
            <button type="submit" name="commentaire">commenter</button><br>
        </form>
    </div>
        <?php $content=ob_get_clean();?>
        