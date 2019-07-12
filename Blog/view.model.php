<?php
 include_once 'connexion.model.php';
class affichage extends Connexion {
	public function spot (){	
		$req='SELECT * FROM posts4 ORDER BY id' ;
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
		if (isset($_GET['id'])){
		$id=$_GET['id'];
		$ide=intval($id);
		$req='SELECT * FROM posts4 WHERE id='.$ide;
		$resultat=$this->connected()->query($req);
		if($resultat->rowCount()){
		while ($x=$resultat->fetch()){
				$data[]=$x;
			}
		return $data;
}
	} else {	header('location:index.php');
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

	public function supprimer(){
$id=$_POST['idk'];
$ide=intval($id);
		 	$idp=$_POST['idp'];

$req="DELETE FROM commentaire WHERE id=".$ide;
$resultat=$this->connected()->query($req);
	header('location:page.view.php?id='.$idp);

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
var_dump($magie);
$bodys=$magie[0]['commentaire'];
$id=$magie[0]['id'];
var_dump($id);
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