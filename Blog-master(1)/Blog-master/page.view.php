

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
