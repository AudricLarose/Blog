

<?php 
require './Model/model.php';

class controller {

public function session_go (){
	session_start();
}


public function init(){
	$bdd_data= new affichage;
	$posts_datas=$bdd_data->spot('posts4');
	$addition=$bdd_data->addition('signalement','commentaire');
	require "View/template.view.php";
	$session=sessionactive();
	// require 'entete.view.php'; 


}

public function pages ($error){
try {
	$id=$_GET["id"];

switch ($error) {
	case 'champs_vide':
	$content_formu= " il faut remplir les champs avant de valider";
			break;
case ' ':
	$content_formu= " ";
			break;
}
	$menus= new affichage;
	$bloc_text_titres = $menus->lecture('posts4');
 	if ($bloc_text_titres){
	$comment=new affichage;
	$commentaires= $comment->show_comment();
	require 'View/pagecom.view.php';
	$this->body($content);} else {
	throw new Exception("Impossible d'afficher la page car elle ne figure pas sur la base de données");

	}
} catch (Exception $e){
	$content = $e->getMessage();
	  $action= new controller;
    $this->body($content);
}


}

public function admin ($error){
	$session=sessionactive();
	try {
	if (!isset($session)){
		if (!isset($error)) {$content_admin= " ";
	}
		else {
switch ($error) {
	case 'wrongpwd':
	$content_admin= " le mot de passe/login est érroné";

		break;
	case 'champs_vide':
	$content_admin= " il faut remplir les champs avant de valider";
			break;
case ' ':
	$content_admin= " ";
			break;
}
		}
		require 'View/administrateur.view.php';			
    $this->body($content);
	}
	else {
			header('location:index.php');
	}
} catch (Exception $e){
	$content = $e->getMessage();
    $this->body($content);
}
}

public function index (){
$bdd_data= new affichage;
$posts_datas=$bdd_data->spot('posts4');
require 'View/accueil.view.php';
    $this->body($content);
}

public function body ($content_body){
	$bdd_data= new affichage;
	$posts_datas=$bdd_data->spot('posts4');
	$addition=$bdd_data->addition('signalement','commentaire');
	require "View/template.view.php";
}

public function deconnecte(){
	$paragraphe=new affichage;
	$paragraphe->deco();
	header('location:index.php');
}

public function signal(){
	$session=sessionactive();
	if ($session=='ok'){
		$comment= new affichage();
		$table=$comment->spot_comment ();		
		require 'View/signal.view.php';
	} else {
		$content='error 404 ';
	}
		 $this->body($content);
}

public function ecriture ($a,$b,$success){
	$session=sessionactive();
	if ($session=='ok'){
		switch ($success) {
			case 'ajout':
      $content_feedback=' ajout effectué !';
				break;
			case 'maj':
      $content_feedback=' mise a jour effectué !';
				break;
				case ' ':
	$content_feedback= " ";
			break;
		}
		
		if ($a!==0){
			$brouill= new affichage;
			$x=$brouill->lecture($b);
			$xt=$x[0]["title"];
			$xb=$x[0]["body"];
		} elseif ($a===0) {
			$xt= ' ';
			$xb= ' ';
		}
				$brouill= new affichage;
		$brouillon=$brouill->spot('brouillon');
	
		if (isset($brouillon)){
			require 'View/brouillon.admin.view.php';

		} else  {
			$content_brouillon='pas de brouillon';
		}
			require 'View/ecriture.view.php'; 
		$this->body($content);
	} else {
		echo "404";

	}
}
}
  $action= new controller;
    $action->session_go ();
