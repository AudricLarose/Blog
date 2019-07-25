

<?php 
require 'view.model.php';

function session_go (){
	session_start();

}

session_go ();
function init(){
	$affichaged= new affichage;
	$affiche=$affichaged->spot('posts4');
	$addition=$affichaged->addition('signalement','commentaire');
	require "template.view.php";
	$session=sessionactive();
	// require 'entete.view.php'; 


}
		$affichaged= new affichage;
	$affiche=$affichaged->spot('posts4');
			$addition=$affichaged->addition('signalement','commentaire');


function pages (){

	$id=$_GET["id"];
	$menus= new affichage;
	$texto = $menus->lecture('posts4');
	$comment=new affichage;
	$commentaire= $comment->show_comment();
	require 'pagecom.view.php';
	body($content);

}

function admin (){
	$session=sessionactive();
	if (!isset($session)){
		require 'administrateur.view.php';
	}
	else {
		$content= "no turning back ...";
	}
	body($content);

}

function index (){
$affichaged= new affichage;
$affiche=$affichaged->spot('posts4');
require 'accueil.view.php';
body($content);
}

function body ($content_body){
	$affichaged= new affichage;
	$affiche=$affichaged->spot('posts4');
	$addition=$affichaged->addition('signalement','commentaire');
	require "template.view.php";
}

function deconnecte(){
	$paragraphe=new affichage;
	$paragraphe->deco();
	header('location:index.php');
}

function signal(){
	$session=sessionactive();
	if ($session=='ok'){
		$comment= new affichage();
		$table=$comment->spot_comment ();
		
		require 'signal.view.php';
	} else {
		$content='error 404 ';
		body($content);

	}
}

// function footer (){
// 	require 'footer.view.php'; 
// }

function ecriture ($a,$b){
	$session=sessionactive();
	if ($session=='ok'){
		if ($a!==0){
			var_dump($a);
			$brouill= new affichage;
			$x=$brouill->lecture($b);
			$xt=$x[0]["title"];
			$xb=$x[0]["body"];
			echo 'pas vide';
		} elseif ($a===0) {
			var_dump($a);
			$xt= ' ';
			$xb= ' ';
		}
				$brouill= new affichage;
		$brouillon=$brouill->spot('brouillon');
		require 'ecriture.view.php'; 
		body($content);
		if (isset($brouillon)){
			require 'brouillon.admin.view.php'; 
		} else  {
			echo 'pas de brouillon';
		}
	} else {
		echo "404";

	}
}

	// if (isset($_SESSION['admin'])){

	// }	 init ();

