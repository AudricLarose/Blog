
  <?php ob_start();?>

<h1> Signalements</h1>
<table>
  <tr>
    <th>id</th>
    <th>message</th>
    <th>nombre de signalement</th>
    <th>options</th>
</tr>
<?php 
foreach ($table as $tables) {
 ?>
    <tr>
      <td><?php echo $tables['id'] ;?></td>
      <td><?php echo $tables['commentaire'] ;?></td>
      <td><?php echo $tables['signalement'] ;?></td>
      <td><form action="index.php?action=montrer_signal" method="POST">
     <input name="idk" type="hidden" value=" <?php echo $tables['id'] ?>"/>
     <button name='supprimer_comment' value='supprimer commentaire'>supprimer</button></form></td>
    </tr>
<?php } ?>
</table>

  <div class='texte_colonne'></div></div></div>

</div>
<div class="bar_footer"></div> 
  </div>
  <script type="text/javascript" src="test.js"></script>

</body>

</html>
  <?php $content=ob_get_clean();?>
