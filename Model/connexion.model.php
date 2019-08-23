<?php
namespace model;

class Connexion 
{
	private $serveur='localhost';
	private $name='root';
	private $passwword='';
	private $bddname='blog';
	public function connected() 
    {
		try {
            $conn= new \PDO ('mysql:host='.$this->serveur.';dbname='.$this->bddname,$this->name,$this->passwword);
		return $conn;
 } catch (Exception $e){
 	echo ' connexion echouée a la base de donnée';
 }
	}
}
