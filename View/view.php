<?php
 include_once 'connexion.model.php';

class affichage extends Connexion {
	public function spot ($x){	
		$req='SELECT * FROM '.$x  ;
		$resultat=$this->connexion()->query($req);

			while ($x=$resultat->fetch()){

				$data[]=$x;
	

			}
			var_dump($data);

		return $data;
		
	}
}