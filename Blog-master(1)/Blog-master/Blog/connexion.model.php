<?php
class Connexion {
	private $serveur='localhost';
	private $name='root';
	private $passwword='';
	private $bddname='blog';
	public function connected(){
		$conn= new PDO ('mysql:host='.$this->serveur.';dbname='.$this->bddname,$this->name,$this->passwword);
		return $conn;

	}
}