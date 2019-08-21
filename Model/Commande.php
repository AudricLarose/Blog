<?php
namespace model;

class Commande extends Connexion {
    public function supprimer($x)
    {
        $id=$_POST['idk'];
        $ide=intval($id);	
        $req='DELETE FROM '.$x.' WHERE id=?';
        $resultat=$this->connected()->prepare($req);
        $resultat->execute([$ide]);
    }
    public function modifier()
    {
        $id=$_POST['idk'];
        $ide=intval($id);
        $req="SELECT id* , commentaire FROM commentaire WHERE id=?";
        $resultat=$this-> connected()->prepare($req);
        $resultat->execute([$ide]);
        while ($row=$resultat->fetch()) {
         $datas[]=$row;
        }
        return $datas;
    }
    public function transforme()
    {
        $body_modifier=$_POST['body'];
        $id=$_POST['id'];
        $idp=$_POST['idp'];
        $ide=intval($id);
        $req="UPDATE commentaire SET commentaire='$body_modifier' WHERE id=?";
        $resultat=$this-> connected()->prepare($req);
        $resultat->execute([$ide]);
    }
    public function signale()
    {
        $id=$_POST['idk'];
        $id_page=$_POST['idke'];
        $ide=intval($id);
        $req="UPDATE commentaire SET signalement=signalement+1 WHERE id=?";
        $resultat=$this->connected()->prepare($req);
        $resultat->execute([$ide]);
        header('location:index.php?action=montrer_chapitre&id='.$id_page.'&success=signaler');
    }
    public function ajouter($x)
    {
        $titre =$_POST['titre_admin'];
        $nom =$_POST['texte_admin'];
        if (empty($titre) || empty($nom)) {
        header('location:index.php?action=montrer_ecriture');
        } else {
            $check= new init;
            $checkdoublons=$check->antidoublons($x, $titre);
            if ($checkdoublons==true) {
                $req="UPDATE $x SET body=? WHERE title=?";
                header('location:index.php?action=montrer_ecriture&success=maj');
            } else {
                echo'ajouter dd';
                $req="INSERT INTO ".$x." (body, title) VALUES (?,?)"; 
                header('location:index.php?action=montrer_ecriture&success=ajout');
            }
            $resultat=$this->connected()->prepare($req);
            $resultat->execute([$nom,$titre]);
        }
    }
}
