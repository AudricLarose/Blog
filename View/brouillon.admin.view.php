<?php ob_start();?>
<br>
<h2 class="center">Brouillon</h2>
<table class="redimension_table">
    <tr>
        <th class="center">titre du brouillon</th>
    </tr>
    <?php
    foreach ($brouillon as $brouillons) {
        ?>
      <tr>
        <td class="center">
            <a href="index.php?action=modification&id=<?= $brouillons->getId()?>">
                <p>
                    <?=$brouillons->getTitle()?>
                </p>
            </a>
            <form action='index.php?action=montrer_ecriture' method='POST'>
                <input name="idk" type="hidden" value="<?= $brouillons->getId();?>" />
                <button name='supprimer_brouillon' class='suppression' value='supprimer'>Supprimer</button>
            </form>
        </td>
    </tr>
    <?php } ?>
</table>
</div>
<?php $content_brouillon=ob_get_clean();?>