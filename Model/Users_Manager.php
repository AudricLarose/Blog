<?php
namespace model;

include_once 'Model/connexion.model.php';
class Users_Manager extends Connexion
{
    public function login()
    {
        $username=$_POST['nom'];
        $password=$_POST['password'];
        if (empty($username) || empty($password)) {
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
            $req="SELECT* FROM user WHERE user=?;";
            $sql=$this->connected()->prepare($req);
            $sql->execute([$username]);
            if (isset($sql)) {
                while ($ssql=$sql->fetch()) {
                  $passwordcheck=password_verify($password, $ssql['password']);
                 if ($passwordcheck==true) {
                     session_start();
                     $_SESSION['admin']= 'ok';
                     header('location:index.php');
                 } else {
                     header('location:index.php?action=montrer_admin&error=wrongpwd');
                    }
                }
            } else {
                header('location:index.php?action=montrer_admin&error=wrongpwd');
            }
        }
    }
}
