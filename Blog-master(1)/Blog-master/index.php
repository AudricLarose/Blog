<?php
require 'controller.php';
require 'formulaire.controller.php';
require 'session.controller.php';


if (isset($_GET['action'])){       
  $action=$_GET['action'];
  if (isset($_GET['id'])){ $id=$_GET['id'];}
  switch ($action) {
    case 'montrer_chapitre':
    
      if (isset($_GET['id'])){
$ide=$_GET['id'];}
      pages ();
      break;
    
    case 'montrer_admin': 
      admin ();
      break;
          
    case 'montrer_signal':
      signal ();
      break;
    
                                        case 'deco':
      deconnecte();
      break;
   
    case 'montrer_ecriture':
     ecriture(0,0);
     break;
   
   case 'modification':
    if (isset($_GET['id'])) { $id=$_GET['id'];  var_dump($id);ecriture($id,'brouillon');} else {echo "pas de variable";}
    if (isset($_GET['id_chapitre'])) { $id=$_GET['id_chapitre']; ecriture($id,'posts4');}
    break;
  
  case 'verifie':
    require 'formulaire.controller.php';
    break;
  
}

} else  {

  index();
  footer ();
}