<?php
include_once 'Model/connexion.model.php';
namespace model
class Affichage extends Connexion
{
    public function spot($x)
    {	
        $req='SELECT * FROM '.$x.' ORDER BY id DESC' ;
        $resultat=$this->connected()->prepare($req);
        $resultat->execute();
        if ($resultat->rowCount()) {
            while ($x=$resultat->fetch()) {
                $data[]=$x;
            }
            return $data;
        }
	}
    public function addition($y, $x)
    {
        $req='SELECT SUM('.$y.') FROM '.$x ;
        $resultat=$this->connected()->prepare($req);
        $resultat->execute();
        while ($x=$resultat->fetch()) {
            $data[]=$x;
        }
        return $data;
    }
    public function spot_comment()
    {	
        $req='SELECT * FROM commentaire ORDER BY signalement DESC' ;
        $resultat=$this->connected()->prepare($req);
        $resultat->execute();
        if ($resultat->rowCount()) {
            while ($x=$resultat->fetch()) {
                $data[]=$x;
            }
                return $data;
        }
    }
    public function lecture($x)
    {
        if ((isset($_GET['id'])) || (isset($_GET['id_chapitre']))) {
            if (isset($_GET['id_chapitre'])) {
                $id=$_GET['id_chapitre'];
            } else {
                $id=$_GET['id'];
            }
            $ide=intval($id);
            $req='SELECT * FROM '.$x.' WHERE id= ?';
            $resultat=$this->connected()->prepare($req);
            $resultat->execute([$ide]);
            if ($resultat->rowCount()) {
                while ($x=$resultat->fetch()) {
                    $data[]=$x;
                }
                return $data;
            }
        }
     }
    public function show_comment()
    {
        $id=$_GET['id'];
        $ide=intval($id);
        $req='SELECT * FROM commentaire WHERE id_comment=?';
        $resultat=$this->connected()->prepare($req);
        $resultat->execute([$ide]);
        if ($resultat->rowCount()) {
            while ($x=$resultat->fetch()) {
                $data[]=$x;
            }
            return $data;
        }
    }
    public function commentaire()
    {
        $commentaire=$_POST['commentairer'];
        $commentaire=htmlspecialchars($commentaire);
        $nom=$_POST['nom'];
        $mail=$_POST['email'];
        $id=$_POST['idk'];
        $id=intval($id);
        if (empty($mail) || empty($nom) || empty($commentaire)) {
            header('location:index.php?action=montrer_chapitre&id='.$id.'&error=champs_vide');
        } else {
            $req="INSERT INTO commentaire (auteur, mail, commentaire, signalement, id_comment) VALUES (?,?,?,?,?)"; 
            $resultat=$this->connected()->prepare($req);
            $resultat->execute([$nom,$mail,$commentaire,0,$id]);
            header('location:index.php?action=montrer_chapitre&id='.$id.'&success=valide');
        }
    }
    public function login()
    {
        echo'ok login';
        $username=$_POST['nom'];
        $password=$_POST['password'];
        if (empty($username) || empty($password)){
            exit();
        } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            exit();
        } else {
            $hashepwd=password_hash($password, PASSWORD_DEFAULT);
            $req="INSERT INTO user (user, password) VALUES (?,?)"; 
            $resultat=$this->connected()->prepare($req);
            $resultat->execute([$username,$hashepwd]);
        }
    }
    public function verifie()
    {
        $username=$_POST['nom'];
        $password=$_POST['password'];
        if (empty($username) || (empty($password))) {
            header('location:index.php?action=montrer_admin&error=champs_vide');
            exit();
        } else {
            $req="SELECT* FROM user;";
            $sql=$this->connected()->prepare($req);
            $sql->execute();
            while ($ssql=$sql->fetch()) {
                $passwordcheck=password_verify($password, $ssql['password']);
                if ($passwordcheck==true){
                    session_start();
                    $_SESSION['admin']= 'ok';
                    header('location:index.php');
                } else {
                    header('location:index.php?action=montrer_admin&error=wrongpwd');
                }
            }
        }
    }
}
