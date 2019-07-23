<?php
 include_once 'connexion.model.php';
class affichage extends Connexion {    // decouper les classes
	public function spot ($x){	
		$req='SELECT * FROM '.$x.' ORDER BY id DESC' ;
		$resultat=$this->connected()->prepare($req);
				$resultat->execute();

	if($resultat->rowCount()){
		while ($x=$resultat->fetch()){
				$data[]=$x;
			}
		return $data;
} }

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
		$id=$_GET['id'];}
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
	}}
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
}}
 public function commentaire (){
 	$commentaire =$_POST['commentairer'];
 	$nom =$_POST['nom'];
 	$mail =$_POST['email'];
 	$id=$_POST['idk'];
 	// $idp=$_POST['idp'];
	$req="INSERT INTO commentaire (auteur, mail, commentaire, signalement, id_comment) VALUES ('$nom','$mail','$commentaire','0', '$id')"; // enlever les valeurs
	$resultat=$this->connected()->prepare($req);
			$resultat->execute();
	session_destroy();
	$_SESSION['user']=$mail;
	//header('location:page.controller.php?id='.$idp);

 }

	public function supprimer($x){
$id=$_POST['idk'];
$ide=intval($id);																		// enlever les variables qui ne servent a rien

$req='DELETE FROM '.$x.' WHERE id=?';
$resultat=$this->connected()->prepare($req);
		$resultat->execute([$ide]);


}

public function forme ($x){
	$texte1=strtolower($x);
	$texte_mod=ucwords($texte1);
	  return $texte_mod;


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
	//header('location:page.controller.php?id='.$idp);
}

 public function signale(){
		$id=$_POST['idk'];
		$ide=intval($id);
		 	$idp=$_POST['idp'];
 		$req="UPDATE commentaire SET signalement=signalement+1 WHERE id=?";
		$resultat=$this->connected()->prepare($req);
				$resultat->execute([$ide]);
 	//header('location:page.controller.php?id='.$idp);
 }

public function antidoublons($x,$y){
	$recherche= $this->spot($x);
	if (isset($recherche)) {
	foreach ($recherche as $recherches) {
	if (in_array($y,$recherches)){
	return true;
	exit();
	}}}}


  public function ajouter ($x){
  	$titre =$_POST['titre_admin'];
 	$nom =$_POST['texte_admin'];
 	$checkdoublons=$this->antidoublons($x,$titre);
 	if($checkdoublons==true){
 	$req="UPDATE $x SET body=? WHERE title=?";
 	echo'maj brouillon';

 } else{
 	echo'ajouter dd';
	$req="INSERT INTO ".$x." (body, title) VALUES (?,?)"; }
	$resultat=$this->connected()->prepare($req);
	$resultat->execute([$nom,$titre]);

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
	//header('locations: index.php?error=Champs_Vide');
	exit();
} else {
	$req="SELECT* FROM user;";
	$sql=$this->connected()->prepare($req);
	$sql->execute();
	while ($ssql=$sql->fetch()){
		$passwordcheck=password_verify($password, $ssql['password']);
if ($passwordcheck==true){
  $_SESSION['admin']= 'ok';


  } 	//header('locations: index.php?error=Mauvais_login');

}}}	

public function deco (){
$_SESSION['admin']= array();
session_destroy();																		
		//header('location:index.php');
	}

public function recherche() {
	echo 'ok recherche';
	if (isset($_POST['recherche'])){
		$id=$_POST['recherche'];
		//header('location:page.controller.php?id='.$id);
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

public function compte(){
	$corps=$_POST['texte_admin'];
	$tab=explode( " ", $corps);
$resultat=count($tab);
echo $resultat;
return $resultat;


}

public function mailing(){
	echo "ok mailing";
	$auteur=$_POST['auteur'];
	$to="l.audric@gmail.com";
	$message=$_POST['mots'];
	$expediteur = "admin@domain.com"; 
date("D, j M Y H:i:s"); //date 
$entete = "From: $expediteur\n"; // expéditeur 
$entete .= "Cc: \n"; 
$entete .= "Reply-To: $expediteur \n"; // Adresse de retour, retour à l'envoyeur en cas d'erreur 
$entete .= "X-Mailer: PHP/" . phpversion() . "\n" ; //version 
$entete .= "Date: ". date("D, j M Y H:i:s"); //date; 
	$subject="voici un mail envoyé de la part de ".$auteur;

mail('l.audric@gmail.com', $subject, $message,$entete);
echo "message envoyé ";	
}


}