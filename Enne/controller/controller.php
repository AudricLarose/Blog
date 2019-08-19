   <?php
   require './modele/modele.php';

   if (isset($_POST['recherche'])){
      $paragraphe=new Affichage;
      $paragraphe->rechercher();
    }


    function defaut (){
    	  		$data =new Affichage;
    	$actions=$data->spot();
    	echo "string";
    	require 'view/affichage.php';
body ($content_body);

    }


    	   function affichage(){
    	   	echo "string";
    	   	$data =new Affichage;
    	   	$actions=$data->rechercher();
require 'view/resultat.php';
body ($content_body);
    	   }


    function body ($content_body){
   		$data =new Affichage;
    	$actions=$data->spot();
require 'view/template.view.php';
    	   }
    ?>