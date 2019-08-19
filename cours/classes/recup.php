<?php
include_once 'connexion.php';

class recup extends dbb{
	

	public function log(){
		$first = $_POST['name'];
	$second = $_POST['text'];
	$request="INSERT INTO posts (title, body) VALUES ('$first','$second')";
	$Nrequest=$this->connect()->query($request);
		echo 'ok';

	return $Nrequest;}
}
$badboom = new recup;
$badboom->log(); 	