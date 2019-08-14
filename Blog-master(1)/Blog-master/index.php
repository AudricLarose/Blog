<?php
require 'Controller/controller.php';
require 'Controller/formulaire.controller.php';
require 'Controller/session.controller.php';

$action =new initial;
$action->init();

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
    $action= new controller;
    $action->pages($error,$success);
    break;
    case 'montrer_admin': 
    if (isset($_GET['error'])){
      $error=$_GET['error'];
    } else {
      $error = " ";
    }
    $action= new controller;
    $action->admin ($error);
    break;
    case 'montrer_signal':
    $action= new controller;
    $action->signal ();
    break;
    
    case 'deco':
    $action= new controller;
    $action->deconnecte();
    break;

    case 'montrer_ecriture':
    if (isset($_GET['success'])) {
      $success=$_GET['success'];
    } else {
      $success = " ";
    }
    $action= new controller;
    $action->ecriture(0,0,$success);
    break;

    case 'modification':
    $success = " ";
    if (isset($_GET['id'])) { 
      $id=$_GET['id'];
      $action= new controller;
      $action->ecriture($id,'brouillon',$success);
    } 
    if (isset($_GET['id_chapitre'])) { 
      $id_chapitre=$_GET['id_chapitre'];  
      $action= new controller;
      $action->ecriture($id_chapitre,'posts4', $success);
    }
    break;

    case 'verifie':
    require 'formulaire.controller.php';
    break;

 default:
require 'View/erreur_404.php';
      $action= new controller;
        $action->body($content);

      break;


  }


} else  {

  $action= new controller;
  $action->index();
}