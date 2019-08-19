<?php
require 'Controller/controller.php';
if (isset($_POST['recherche'])){
	affichage();
} else {
	defaut ();
}
?>
