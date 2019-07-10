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
	}
	public function lecture(){
		$id=$_GET['id'];
		$ide=intval($id);
		$req='SELECT * FROM posts4 WHERE id='.$ide;
		$resultat=$this->connected()->query($req);
		while ($x=$resultat->fetch()){
				$data[]=$x;
			}
		return $data;

	}
public function show_comment (){
	$id=$_GET['id'];
		$ide=intval($id);
		$req='SELECT * FROM commentaire WHERE id_comment='.$ide;
		$resultat=$this->connected()->query($req);
		while ($x=$resultat->fetch()){
				$data[]=$x;
			}
		return $data;
}
 public function commentaire (){
 	$commentaire =$_POST['commentairer'];
 	 	$nom =$_POST['nom'];
 	$mail =$_POST['email'];
 	$id=$_POST['idk'];
	$req="INSERT INTO commentaire (auteur, mail, commentaire, signalement, id_comment) VALUES ('$nom','$mail','$commentaire','0', '$id')"; 
	echo'ok';

	$resultat=$this->connected()->query($req);
echo'ok';
	header('locations:page.view.php');

 }

public function forme ($x){
	$texte1=strtolower($x);

	$texte_mod=ucwords($texte1);

	  return $texte_mod;
}


}


if (isset($_POST['commentaire'])){
	$action =new affichage;
	$action->commentaire();
}  