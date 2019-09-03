<?php
namespace model;

include_once 'Model/connexion.model.php';
class Posts_Manager extends Connexion
{   
    public function getPost($x)
    {
        $req='SELECT * FROM '.$x.' ORDER BY id DESC' ;
        $resultat=$this->connected()->prepare($req);
        $resultat->execute();
        if ($resultat->rowCount()) {
            while ($x=$resultat->fetch()) {
                $data[]=$x;
            }
            foreach ($data as $datas) {
                    $data_hydrated= new \model\Entity_Post_Model();
                    $data_hydrated->hydratation($datas);
                    $datae[]=$data_hydrated;
            }
            return $datae;
        }
    }
    public function supprimerPost($x)
    {
        $id=$_POST['idk'];
        $ide=intval($id);
        $req='DELETE FROM '.$x.' WHERE id=?';
        $resultat=$this->connected()->prepare($req);
        $resultat->execute([$ide]);
        header('location:index.php?action=montrer_ecriture&success=suppression');

    }
    public function lecturePost($x)
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
                var_dump($data);
                foreach ($data as $datas) {
                    $data_hydrated= new \model\Entity_Post_Model();
                    $data_hydrated->hydratation($datas);
                    }
                return $data_hydrated;
            }
        }
    }
    public function ajouterPost($x)
    {
        $titre =$_POST['titre_admin'];
        $nom =$_POST['texte_admin'];
        if (empty($titre) || empty($nom)) {
            header('location:index.php?action=montrer_ecriture');
        } else {
            $check= new \outils\Tools();
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
