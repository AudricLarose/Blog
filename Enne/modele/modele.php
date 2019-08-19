<?php
include_once 'modele/connexion.model.php';
class Affichage extends Connexion {  
		public function rechercher (){	
			$resultat=$_POST['entree_de_la_recherche'];
		$req='SELECT * FROM bdd_enne WHERE Type_1='.$resultat.' or Type_2='.$resultat.'' ;
		$resultat=$this->connected()->prepare($req);
		$resultat->execute();
		if($resultat->rowCount()){
			while ($x=$resultat->fetch()){
				$data[]=$x;
			}
			return $data;
		} 																																																																																																		
	}
		public function spot (){	
		$req='SELECT * FROM bdd_enne ORDER BY id_groupe_question DESC' ;
		$resultat=$this->connected()->prepare($req);
		$resultat->execute();

		if($resultat->rowCount()){
			while ($x=$resultat->fetch()){
				$data[]=$x;
			}

			return $data;
		} 	else {
			echo "pas de resultat";
		}		


	}}