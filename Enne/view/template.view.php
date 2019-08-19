<!DOCTYPE html>
<html>
<head>


</head>


<body>

   <div class="formulaire_admin">
<form action='index.php?recherche' method="POST" >
Numero <br><input type="text" name="entree_de_la_recherche" required="required" /><br>
<button type='submit' name='recherche'>rechercher</button><br>
</form>

        <?= $content_body; ?>     

  </body>


  </html>