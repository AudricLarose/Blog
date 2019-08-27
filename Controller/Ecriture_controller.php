<?php
namespace controller;

class Ecriture_controller 
{
    public function ecriture($a, $b, $success)
    {
        $content_onglet_titre="Creation";
        $sessions=new \outils\Tools();
        $session=$sessions->sessionactive();
        if ($session=='ok') {
            switch ($success) {
                case 'ajout':
                    $content_feedback=' ajout effectué !';
                    break;
                case 'maj':
                    $content_feedback=' mise a jour effectué !';
                    break;
                case ' ':
                    $content_feedback= " ";
                    break;
            }
            if ($a!==0) {
                echo 'ok';
                $brouill= new \model\Posts_Manager();
                $x=$brouill->lecturePost($b);
                $xt=$x[0]["title"];
                $xb=$x[0]["body"];
            } elseif ($a===0) {
                $xt= ' ';
                $xb= ' ';
            }
            $brouill= new \model\Posts_Manager();
            $brouillon=$brouill->getPost('brouillon');
            if (isset($brouillon)) {
                require 'View/brouillon.admin.view.php';
            } else {
                $content_brouillon='pas de brouillon';
            }
            require 'View/ecriture.view.php';
        } else {
            require 'View/erreur_404.php';
        }
        $body=new \outils\Tools();
        $body->body($content, $content_onglet_titre);
    }
}
