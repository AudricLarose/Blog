<?php
namespace controller;

require 'Public/Tools/tools.php';
require 'Controller/Initial_controller.php';
require 'Controller/Admin_controller.php';
require 'Controller/Pages_controller.php';
require 'Controller/Ecriture_controller.php';
require 'Controller/Signal_controller.php';

$action= new \outils\Tools();
$action->init();
session_start();
if (isset($_GET['action'])) {
    $action=$_GET['action'];
    if (isset($_GET['id'])) {
        $id=$_GET['id'];
    } 
    switch ($action) {
        case 'montrer_chapitre':
            if (isset($_GET['error'])) {
                $error=$_GET['error'];
            } else {
                $error = " ";
            }
            if (isset($_GET['success'])) {
                $success=$_GET['success'];
            } else {
                $success = " ";
            }
            $action= new Pages_controller;
            $action->pages($error, $success);
            break;
        case 'montrer_admin':
            if (isset($_GET['error'])) {
                $error=$_GET['error'];
            } else {
                $error = " ";
            }
            $action= new Admin_controller;
            $action->admin($error);
            break;
        case 'montrer_signal':
            if (isset($_GET['success'])) {
                $success=$_GET['success'];
            } else {
                $success = " ";
            }
            $action= new Signal_controller;
            $action->signal($success);
            break;
        case 'deco':
            $action= new Initial_controller;
            $action->deconnecte();
            break;
        case 'montrer_ecriture':
            if (isset($_GET['success'])) {
                $success=$_GET['success'];
            } else {
                $success = " ";
            }
            $action= new Ecriture_controller;
            $action->ecriture(0, 0, $success);
            break;
        case 'modification':
            $success = " ";
            if (isset($_GET['id'])) {
                $id=$_GET['id'];
                $action= new Ecriture_controller;
                $action->ecriture($id, 'brouillon', $success);
            }
            if (isset($_GET['id_chapitre'])) {
                $id_chapitre=$_GET['id_chapitre'];
                $action= new Ecriture_controller;
                $action->ecriture($id_chapitre, 'posts4', $success);
            }
            break;
        case 'verifie':
            require 'formulaire.controller.php';
            break;
        default:
            require 'View/erreur_404.php';
            $content_onglet_titre="erreur_404";
            $body= new \outils\Tools();
            $body->body($content,$content_onglet_titre);
            break;
    }
} else {
    $action= new Initial_controller;
    $action->index();
}
