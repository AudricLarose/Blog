
   <?php
   include_once 'view.model.php'; 

    $show = new affichage;
$texto = $show->lecture('posts4');?>
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
