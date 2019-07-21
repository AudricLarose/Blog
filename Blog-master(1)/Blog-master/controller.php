

<?php 
require 'view.model.php';

function session_go (){
	session_start();

}

session_go ();
function init(){
$menus= new affichage;
$nav=$menus->spot('posts4');
$addition=$menus->addition('signalement','commentaire');
$session=sessionactive();
 require 'entete.view.php'; 
 require 'bar_menu.view.php';
 require 'side_menu.view.php';
}


function pages (){
		 init ();
$id=$_GET["id"];
$menus= new affichage;
$texto = $menus->lecture('posts4');
 require 'container_chapitre_text.view.php';
 require 'show_comment.view.php';
require 'page.view.php';
}

function admin (){
	 init ();
$session=sessionactive();
if (!isset($session)){
require 'administrateur.view.php';
}
else {
	echo "no turning back ...";
}}

function index (){
	 init ();
$affichaged= new affichage;
$affiche=$affichaged->spot('posts4');
require 'accueil.view.php';

}

function deconnecte(){
	  $paragraphe=new affichage;
  $paragraphe->deco();
header('location:index.php');}

function signal(){
		 init ();

		$session=sessionactive();
if ($session=='ok'){
$comment= new affichage();
$table=$comment->spot_comment ();
require 'signal.view.php';} else {
	echo 'error 404 ';
}
}

function footer (){
	require 'footer.view.php'; 
}

function ecriture ($a,$b){
$session=sessionactive();
 init ();
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
	require 'ecriture.view.php'; 
	 $brouill= new affichage;
$brouillon=$brouill->spot('brouillon');
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

