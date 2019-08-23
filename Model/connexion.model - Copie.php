<?php
namespace model;

class Connexion {
    private $serveur='audriclait292.mysql.db';
    private $name='audriclait292';
    private $passwword='82941858Aca';
    private $bddname='audriclait292';
    public function connected(){
        try {
            $conn= new \PDO ('mysql:host='.$this->serveur.';dbname='.$this->bddname,$this->name,$this->passwword);
        return $conn;
        } catch (Exception $e) {
            echo 'connexion echouée a la base de donnée';
        }
    }
}
