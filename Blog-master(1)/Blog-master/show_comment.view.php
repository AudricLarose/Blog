<div class='comment'>
  <div class="show_comment">

    <?php
$comment=new affichage;
$commentaire= $comment->show_comment();
if (isset($_GET['id'])){
$ide=$_GET['id'];} else { header('location:index.php');}
if ($commentaire){
foreach ($commentaire as $commentaires) {
$nom=$commentaires['auteur'];
$auteur=$comment->forme($nom);
echo "<form action='view.model.php' method='POST'>";
echo '<br> <div class="auteur"><strong>'.$auteur.'</strong></div>';
echo '<div class="date">'.$commentaires['date'].'</div>';
echo '<div class="conversa">'.$commentaires['commentaire'].'</div>';
if (isset($_SESSION['user'])){
if ($commentaires['mail']==$_SESSION['user']){
    echo' <button type="submit" name="supprimer">supprimer</button>';
    echo' <button type="submit" name="maj">modifier</button>';


  }
}
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