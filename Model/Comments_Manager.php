<?php
namespace model;

class Comments_Manager extends Connexion 
{
    public function supprimerComment()
    {
        $id=$_POST['idk'];
        $ide=intval($id);
        $req='DELETE FROM  commentaire WHERE id=?';
        $resultat=$this->connected()->prepare($req);
        $resultat->execute([$ide]);
    }
    public function additionCommentSignal($y)
    {
        $req='SELECT SUM('.$y.') FROM commentaire';
        $resultat=$this->connected()->prepare($req);
        $resultat->execute();
        while ($x=$resultat->fetch()) {
            $data[]=$x;
        }
        return $data;
    }
    public function getComment()
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
    public function modifierComment()
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
    // public function transforme()
    // {
    //     $body_modifier=$_POST['body'];
    //     $id=$_POST['id'];
    //     $idp=$_POST['idp'];
    //     $ide=intval($id);
    //     $req="UPDATE commentaire SET commentaire='$body_modifier' WHERE id=?";
    //     $resultat=$this-> connected()->prepare($req);
    //     $resultat->execute([$ide]);
    // }
    public function signalerComment()
    {
        $id=$_POST['idk'];
        $id_page=$_POST['idke'];
        $ide=intval($id);
        $req="UPDATE commentaire SET signalement=signalement+1 WHERE id=?";
        $resultat=$this->connected()->prepare($req);
        $resultat->execute([$ide]);
        header('location:index.php?action=montrer_chapitre&id='.$id_page.'&success=signaler');
    }
    public function showComment()
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
    public function commenter()
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
}
