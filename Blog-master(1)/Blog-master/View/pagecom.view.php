	<?php ob_start();?>
  <h2 class='titre'>
    <?php  foreach($bloc_text_titres as $bloc_text_titre){
     echo $bloc_text_titre["title"];

   }
   ?></h2>
   <div class='texte_colonne'>
     <?php  foreach($bloc_text_titres as $bloc_text_titre){
       echo $bloc_text_titre['body'] ;  
     }
     ?>
   </div>


   <div class='comment'>
    <div class="show_comment">

      <?php
      if ($commentaires){
        foreach ($commentaires as $commentaire) {
          $nom=$commentaire['auteur'];
          $auteur=$comment->forme($nom);
          ?>

          <form action='index.php' method='POST'>
            <br> <div class="auteur"><strong><?php echo  $auteur ?></strong></div>
            <div class="date"><?php echo $commentaire['date'] ?></div>
            <div class="conversa"><?php echo $commentaire['commentaire'] ?></div>
            <button type="submit" name="signaler">signaler</button>
            <input name="idk" type="hidden" value="<?php echo $commentaire['id'] ?>"/>
          </form>
          <?php 

        }} else {
          echo' Pas de commentaire, soyez le premier a vous exprimer !';
        }
        ?>
      </div>

    </div>
    <div class='formulaire'>
      <form action='index.php?action=montrer_chapitre' method='POST'>
       <div class="isRedBcg"> <?= $content_formu; ?>     </div>
       <br>              <input name="idk" type="hidden" value=' <?php echo $id ?>'/>
       <input type="text" name="nom" placeholder="Nom" required="required"></input><br><br>
       <input type="text" name="email" placeholder="email" required="required"></imput><br><br>
       <textarea name="commentairer"  cols="40" rows="5" class='comment' placeholder="Tapez votre commentaire" ></textarea><br /><br>
       <button type="submit" name="commentaire">commenter</button><br>
     </div>

     <?php $content=ob_get_clean();?>
