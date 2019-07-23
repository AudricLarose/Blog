
<div class='formulaire'>
<form action='index.php?action=montrer_chapitre' method='POST'>
  <input name="idk" type="hidden" value=' <?php echo $id ?>'/>
<input type="text" name="nom" placeholder="Nom" required="required"></input><br><br>
<input type="text" name="email" placeholder="email" required="required"></imput><br><br>
<textarea name="commentairer"  cols="70" rows="5" class='comment' placeholder="Tapez votre commentaire" required="required"></textarea><br /><br>
<button type="submit" name="commentaire">commenter</button><br>
</div>
</div>

</div>


<h2 class='titre'>
  <?php  foreach($texto as $textos){
 echo $textos["title"];
 
}
	?></h2>
  <div class='texte_colonne'>
   <?php  foreach($texto as $textos){
 echo $textos['body'] ;   
}
?>
</div>

<div class='comment'>
  <div class="show_comment">

    <?php

if ($commentaire){
foreach ($commentaire as $commentaires) {
$nom=$commentaires['auteur'];
$auteur=$comment->forme($nom);
echo "<form action='view.model.php' method='POST'>";
echo '<br> <div class="auteur"><strong>'.$auteur.'</strong></div>';
echo '<div class="date">'.$commentaires['date'].'</div>';
echo '<div class="conversa">'.$commentaires['commentaire'].'</div>';
$ide=intval($ide);
echo' <button type="submit" name="signaler">signaler</button>';
 echo '<input name="idk" type="hidden" value="'.$commentaires['id'].'"/>';
 echo '<input name="idp" type="hidden" value="'.$ide.'"/></form>';
 

}} else {
  echo' Pas de commentaire, soyez le premier a vous exprimer !';
}
    ?>
  </div>

</div>

?>

