<?php
 include_once 'connexion.model.php';
class affichage extends Connexion {
	public function spot ($x){	
		$req='SELECT * FROM '.$x.' ORDER BY id' ;
		$resultat=$this->connected()->query($req);
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
		$req='SELECT * FROM '.$x.' WHERE id='.$ide;
		$resultat=$this->connected()->query($req);
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
		var_dump($ide);
		$req='SELECT * FROM commentaire WHERE id_comment='.$ide;
		$resultat=$this->connected()->query($req);
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
 	 	$idp=$_POST['idp'];
	$req="INSERT INTO commentaire (auteur, mail, commentaire, signalement, id_comment) VALUES ('$nom','$mail','$commentaire','0', '$id')"; 
	echo'ok';
	$resultat=$this->connected()->query($req);
	session_start();
	session_destroy();
	session_start();
	$_SESSION['user']=$mail;
	header('location:page.view.php?id='.$idp);

 }

	public function supprimer($x){
$id=$_POST['idk'];
$ide=intval($id);
var_dump($ide);
$req='DELETE FROM '.$x.' WHERE id='.$ide;
$resultat=$this->connected()->query($req);

}

public function forme ($x){
	$texte1=strtolower($x);
	$texte_mod=ucwords($texte1);
	  return $texte_mod;


}
	public function modifier(){
$id=$_POST['idk'];
$ide=intval($id);
var_dump($ide);
$req="SELECT id , commentaire FROM commentaire WHERE id=".$ide;
$resultat=$this-> connected()->query($req);
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
	$req="UPDATE commentaire SET commentaire='$body_modifier' WHERE id=".$ide;
	$resultat=$this-> connected()->query($req);
	header('location:page.view.php?id='.$idp);
}

 public function signale(){
		$id=$_POST['idk'];
		$ide=intval($id);
		 	$idp=$_POST['idp'];
 		$req="UPDATE commentaire SET signalement=signalement+1 WHERE id=".$ide;
		$resultat=$this->connected()->query($req);
 	header('location:page.view.php?id='.$idp);
 }

public function antidoublons($x,$y){
	$recherche= $this->spot($x);
	foreach ($recherche as $recherches) {
	if (in_array($y,$recherches)){
	return true;
	exit();
	}}}

public function ajouter_brouillon (){
 	$titre =$_POST['titre_admin'];
 	$nom =$_POST['texte_admin'];
 	$checkdoublons=$this->antidoublons('brouillon',$titre);
 	if($checkdoublons==true){
 	$req="UPDATE brouillon SET body='$nom' WHERE title='$titre'";
 	 	echo'maj brouillon';

 } else{
 	echo'ajouter brouillon';
	$req="INSERT INTO brouillon (body, title) VALUES ('$nom','$titre')"; }
	$resultat=$this->connected()->query($req);

 }
 public function login(){
 	echo'ok login';
	$username=$_POST['nom'];
$password=$_POST['password'];
			if (empty($username) || empty($password)){
				header('location: index.php?error=empty_fields&='.$username);
				exit();
			} else if (!preg_match("/^[a-zA-Z0-9]*$/",$username)){
				header('locations: index.php?error=invalide_name');
				exit();
			}
			 else {
			 	$hashepwd=password_hash($password, PASSWORD_DEFAULT);
			 	$req="INSERT INTO user (user, password) VALUES ('$username','$hashepwd')"; 
				$resultat=$this->connected()->query($req);		

			 } 

}

public function verifie(){
	 	echo'ok verifie';

	$username=$_POST['nom'];
$password=$_POST['password'];
if (empty($username) || (empty($password))){
	header('locations: index.php?error=Champs_Vide');
	exit();
} else {
	$req="SELECT* FROM user;";
	$sql=$this->connected()->query($req);
	while ($ssql=$sql->fetch()){
		$passwordcheck=password_verify($password, $ssql['password']);
if ($passwordcheck==true){
	session_start();
	$_SESSION['admin']= true;
	echo 'exact !' ;
	exit ();
	} 
}
header('locations: index.php?error=Mauvais_login');

}	
}
public function deco (){
$_SESSION['admin'] = array();
session_start();
$_SESSION['admin']= array();
session_destroy();
echo 'session detruite';
}	
public function recherche() {
	echo 'ok recherche';
	if (isset($_POST['recherche'])){
		$id=$_POST['recherche'];
		header('location:page.view.php?id='.$id);;
}
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
	var_dump($auteur);
	var_dump($to);
	var_dump($message);
mail('l.audric@gmail.com', $subject, $message,$entete);
echo "message envoyé ";	
}
 public function ajouter_chapitre (){
  	$titre =$_POST['titre_admin'];
 	$nom =$_POST['texte_admin'];
 	$checkdoublons=$this->antidoublons('posts4',$titre);
 	if($checkdoublons==true){
 	$req="UPDATE posts4 SET body='$nom' WHERE title='$titre'";
 	echo'maj brouillon';

 } else{
 	echo'ajouter brouillon';
	$req="INSERT INTO posts4 (body, title) VALUES ('$nom','$titre')"; }
	$resultat=$this->connected()->query($req);

 }
}
if (isset($_POST['commentaire'])){
	$action =new affichage;
	$action->commentaire();
}  
if (isset($_POST['supprimer'])){
	$action =new affichage;
	$action->supprimer();

}  
if (isset($_POST['maj'])){ 
$paragraphe = new affichage;
$magie=$paragraphe->modifier();
$bodys=$magie[0]['commentaire'];
$id=$magie[0]['id'];
echo "<form action='view.model.php' method='post'>
<select name='id' id=''><br /><option name='id' value='$id' >$id</option></select><textarea name='body' cols='30' rows='10'>$bodys</textarea><br /> <button type='submit' name='modifier'>affichageer</button>
</form>";
}
if (isset($_POST['modifier'])){
	$paragraphe=new affichage;
	$paragraphe->transforme();
}
if (isset($_POST['signaler'])){
	$paragraphe=new affichage;
	$paragraphe->signale();
}

if (isset($_POST['new_chapitre'])){
	$action =new affichage;
	$action->ajouter_chapitre();
	 	header('location:ecriture.view.php?id=0');

} 
if (isset($_POST['sauvegarde'])){
	$action =new affichage;
	 	$titre =$_POST['titre_admin'];
	$action->ajouter_brouillon();
	 	header('location:ecriture.view.php?id=0');


}   
if (isset($_POST['supprimer_brouillon'])){
	$paragraphe=new affichage;
	$paragraphe->supprimer('brouillon');
header('location:ecriture.view.php?id=0');

}
if (isset($_POST['supprimer_chapitre'])){
	$paragraphe=new affichage;
	$paragraphe->supprimer('posts4');
header('location:ecriture.view.php?id=0');
}
if (isset($_POST['modifier_chapitre'])){
  
}

if (isset($_POST['reset'])){
 	header('location:ecriture.view.php?id=0');
}

if (isset($_POST['supprimer_comment'])){
		$paragraphe=new affichage;
	$paragraphe->supprimer('commentaire');
}


if (isset($_POST['inscription'])){
	$paragraphe=new affichage;
	$paragraphe->login();
}


if (isset($_POST['tentative'])){
	$paragraphe=new affichage;
	$paragraphe->verifie();
}


if (isset($_GET['state'])){
	$paragraphe=new affichage;
	$paragraphe->deco();
}

if (isset($_POST['chercher'])){
	$paragraphe=new affichage;
	$paragraphe->recherche();
}
if (isset($_POST['takemail'])){
	$paragraphe=new affichage;
	$paragraphe->mailing();
}