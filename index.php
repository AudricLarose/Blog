<?php
require 'Controller/controller.php';
require 'Controller/formulaire.controller.php';
require 'Controller/index.controller.php';
require 'Controller/body.controller.php';
require 'Controller/admin.controller.php';
require 'Controller/session.controller.php';
require 'Controller/page.controller.php';
require 'Controller/ecriture.controller.php';
require 'Controller/signal.controller.php';
require 'Controller/deconnecte.controller.php';

$action =new initial;
$action->init();
$action= new controller;
$action->session_go ();

if (isset($_GET['action'])){       
  $action=$_GET['action'];
  if (isset($_GET['id'])){ $id=$_GET['id'];}
  switch ($action) {

    case 'montrer_chapitre':

    if (isset($_GET['error'])){
      $error=$_GET['error'];
    } else {
      $error = " ";
    }
    if (isset($_GET['success'])) {
      $success=$_GET['success'];
    } else {
      $success = " ";
    }
    $action= new Pages_class;
    $action->pages($error,$success);
    break;
    case 'montrer_admin': 
    if (isset($_GET['error'])){
      $error=$_GET['error'];
    } else {
      $error = " ";
    }
    $action= new Admin_class;
    $action->admin ($error);
    break;
    case 'montrer_signal':
    $action= new Signal_class;
    $action->signal ();
    break;
    
    case 'deco':
    $action= new Deco_class;
    $action->deconnecte();
    break;

    case 'montrer_ecriture':
    if (isset($_GET['success'])) {
      $success=$_GET['success'];
    } else {
      $success = " ";
    }
    $action= new Ecriture_class;
    $action->ecriture(0,0,$success);
    break;

    case 'modification':
    $success = " ";
    if (isset($_GET['id'])) { 
      $id=$_GET['id'];
      $action= new Ecriture_class;
      $action->ecriture($id,'brouillon',$success);
    } 
    if (isset($_GET['id_chapitre'])) { 
      $id_chapitre=$_GET['id_chapitre'];  
      $action= new Ecriture_class;
      $action->ecriture($id_chapitre,'posts4', $success);
    }
    break;

    case 'verifie':
    require 'formulaire.controller.php';
    break;

 default:
require 'View/erreur_404.php';
      $action= new Body_class;
        $action->body($content);

      break;


  }


} else  {

  $action= new Index_class;
  $action->index();
}