<?php
 include_once 'connexion.model.php';
class affichage extends Connexion {
	public function spot (){	
		$req='SELECT * FROM posts4'  ;
		$resultat=$this->connected()->query($req);
	while ($x=$resultat->fetch()){
				$data[]=$x;
	

			}
		return $data;

		
	}
	public function extrait($x,$y){
		
		$extr = explode(' ', "$x",$y);
$extr[$y-1]=" ";
$extrait=implode(" ", $extr);
return $extrait;
	}}
