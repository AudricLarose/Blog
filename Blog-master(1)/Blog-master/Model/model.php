<?php
include_once 'Model/connexion.model.php';
class affichage extends Connexion {  
	public function spot ($x){	
		$req='SELECT * FROM '.$x.' ORDER BY id DESC' ;
		$resultat=$this->connected()->prepare($req);
		$resultat->execute();
		if($resultat->rowCount()){
			while ($x=$resultat->fetch()){
				$data[]=$x;
			}
			return $data;
		} 																																																																																																		
	}
public function addition($y,$x){
	$req='SELECT SUM('.$y.') FROM '.$x ;
	$resultat=$this->connected()->prepare($req);
	$resultat->execute();
	while ($x=$resultat->fetch()){
		$data[]=$x;
	}
	return $data;

}
	public function spot_comment (){	
		$req='SELECT * FROM commentaire ORDER BY signalement DESC' ;
		$resultat=$this->connected()->prepare($req);
		$resultat->execute();

		if($resultat->rowCount()){
			while ($x=$resultat->fetch()){
				$data[]=$x;
			}
			return $data;
		}
	}


	public function extrait($x,$y){

		$extr = explode(' ', "$x",$y);
		$extr[$y-1]=" ";
		$extrait=implode(" ", $extr);
		return $extrait;
	}

	public function lecture($x){
		if ((isset($_GET['id'])) || (isset($_GET['id_chapitre']))) {
			if (isset($_GET['id_chapitre'])) { 
				$id=$_GET['id_chapitre']; 
			} else{
				$id=$_GET['id'];
			}
			$ide=intval($id);
			$req='SELECT * FROM '.$x.' WHERE id= ?';
			$resultat=$this->connected()->prepare($req);
			$resultat->execute([$ide]);
			if($resultat->rowCount()){
				while ($x=$resultat->fetch()){
					$data[]=$x;
				}
				return $data;
			}
		}
	}
	public function show_comment (){
		$id=$_GET['id'];
		$ide=intval($id);
		$req='SELECT * FROM commentaire WHERE id_comment=?';
		$resultat=$this->connected()->prepare($req);
		$resultat->execute([$ide]);

		if($resultat->rowCount()){
			while ($x=$resultat->fetch()){
				$data[]=$x;
			}

			return $data;
		}
	}
	public function commentaire (){
		$commentaire =$_POST['commentairer'];
		$nom =$_POST['nom'];
		$mail =$_POST['email'];
		$id=$_POST['idk'];
		$id=intval($id);
if (empty($mail) || empty($nom) || empty ($commentaire)){
header('location:index.php?action=montrer_chapitre&id='.$id.'&error=champs_vide');
} else{
		$req="INSERT INTO commentaire (auteur, mail, commentaire, signalement, id_comment) VALUES (?,?,?,?,?)"; 
		$resultat=$this->connected()->prepare($req);
		$resultat->execute([$nom,$mail,$commentaire,0,$id]);
header('location:index.php?action=montrer_chapitre&id='.$id);
}
	}


	public function forme ($x){
		$texte1=strtolower($x);
		$texte_mod=ucwords($texte1);
		return $texte_mod;


	}
	public function login(){
		echo'ok login';
		$username=$_POST['nom'];
		$password=$_POST['password'];
		if (empty($username) || empty($password)){
				//header('location: index.php?error=empty_fields&='.$username);
			exit();
		} else if (!preg_match("/^[a-zA-Z0-9]*$/",$username)){
				//header('locations: index.php?error=invalide_name');
			exit();
		}
		else {
			$hashepwd=password_hash($password, PASSWORD_DEFAULT);
			$req="INSERT INTO user (user, password) VALUES (?,?)"; 
			$resultat=$this->connected()->prepare($req);
			$resultat->execute([$username,$hashepwd]);


		} 

	}

	public function verifie(){
		echo'ok verifie';
		$username=$_POST['nom'];
		$password=$_POST['password'];
		if (empty($username) || (empty($password))){
		header('location:index.php?action=montrer_admin&error=champs_vide');
			exit();
		} else {
			$req="SELECT* FROM user;";
			$sql=$this->connected()->prepare($req);
			$sql->execute();
			while ($ssql=$sql->fetch()){
				$passwordcheck=password_verify($password, $ssql['password']);
				if ($passwordcheck==true){
					$_SESSION['admin']= 'ok';
			header('location:index.php');
  } 	else {
		header('location:index.php?action=montrer_admin&error=wrongpwd');
  }
}
}
}


public function deco (){
	$_SESSION['admin']= array();
	session_destroy();																		
		//header('location:index.php');
}

public function recherche() {
	echo 'ok recherche';
	if (isset($_POST['recherche'])){
		$id=$_POST['recherche'];
		header('location:index.php?action=montrer_chapitre&id='.$id);
	}
// public function compte(){
// 	$corps=$_POST['texte_admin'];
// 	$tab=explode( " ", $corps);
// 	$resultat=count($tab);
// 	echo $resultat;
// 	return $resultat;
// }}




}	
}
class commande extends Connexion {    

	public function supprimer($x){
$id=$_POST['idk'];
$ide=intval($id);	
$req='DELETE FROM '.$x.' WHERE id=?';
$resultat=$this->connected()->prepare($req);
$resultat->execute([$ide]);
}


public function modifier(){
	$id=$_POST['idk'];
	$ide=intval($id);
	$req="SELECT id , commentaire FROM commentaire WHERE id=?";
	$resultat=$this-> connected()->prepare($req);
	$resultat->execute([$ide]);
	while ($row=$resultat->fetch()) {
		$datas[]=$row;
	}
	return $datas;
}

public function transforme (){
	$body_modifier=$_POST['body'];
	$id=$_POST['id'];
	$idp=$_POST['idp'];
	$ide=intval($id);
	$req="UPDATE commentaire SET commentaire='$body_modifier' WHERE id=?";
	$resultat=$this-> connected()->prepare($req);
	$resultat->execute([$ide]);
}

public function signale(){
	$id=$_POST['idk'];
	$ide=intval($id);
	$req="UPDATE commentaire SET signalement=signalement+1 WHERE id=?";
	$resultat=$this->connected()->prepare($req);
	$resultat->execute([$ide]);

}

public function antidoublons($x,$y){
	$data= new affichage;
	$recherche= $data->spot($x);
	if (isset($recherche)) {
		foreach ($recherche as $recherches) {
			if (in_array($y,$recherches)){
				return true;
				exit();
			}
		}
	}
}


public function ajouter ($x){
	$titre =$_POST['titre_admin'];
	$nom =$_POST['texte_admin'];
	if (empty($titre) || empty($nom)){
		header('location:index.php?action=montrer_ecriture');
	} else {

	$checkdoublons=$this->antidoublons($x,$titre);
	if($checkdoublons==true){
		$req="UPDATE $x SET body=? WHERE title=?";
header('location:index.php?action=montrer_ecriture&success=maj');

	} else{
		echo'ajouter dd';
		$req="INSERT INTO ".$x." (body, title) VALUES (?,?)"; 
header('location:index.php?action=montrer_ecriture&success=ajout');

	}
		$resultat=$this->connected()->prepare($req);
		$resultat->execute([$nom,$titre]);
	}}



}