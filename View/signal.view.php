<?php ob_start();?>
<h1> Signalements</h1>
<div class='isBlue'>
    <?= $content_feedback;?>
</div>
<table>
    <tr>
        <th class="center">message</th>
        <th>nombre de signalement/option </th>
    </tr>
    <?php
    foreach ($table as $tables) {
        ?>
       <tr>
        <td class="center">
            <?php 
            echo $tables->getCommentaire();?>
        </td>
        <td class="center">
            <?php echo $tables->getSignalement() ;?>
            <form action="index.php?action=montrer_signal" method="POST">
                <input name="idk" type="hidden" value=" <?php echo $tables->getId() ?>" />
                <button name='supprimer_comment' value='supprimer commentaire'>supprimer</button>
            </form>
        </td>
    </tr>
    <?php } ?>
</table>
<div class='texte_colonne'></div>
</div>
</div>
</div>
</div>
<?php $content=ob_get_clean();?>