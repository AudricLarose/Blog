<?php
namespace controller;

class Admin_controller
{
    public function admin($error)
    {
        $content_onglet_titre="Admin connection";
        $sessions= new \outils\Tools();
        $session=$sessions->sessionactive();
        try {
            if (!isset($session)) {
                if (!isset($error)) {
                    $content_admin= " ";
                } else {
                    switch ($error) {
                        case 'wrongpwd':
                            $content_admin= " le mot de passe/login est erroné";
                            break;
                        case 'champs_vide':
                            $content_admin= " il faut remplir les champs avant de valider";
                            break;
                        case ' ':
                            $content_admin= " ";
                            break;
                    }
                }
                require 'View/administrateur.view.php';
                $body= new \outils\Tools();
                $body->body($content, $content_onglet_titre);
            } else {
                header('location:index.php');
            }
        } catch (Exception $e) {
            $content = $e->getMessage();
            $body= new \outils\Tools();
            $body->body($content, $content_onglet_titre);
        }
    }
}
