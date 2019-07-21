<?php
 function sessionactive(){
 	if (isset($_SESSION['admin'])) {
 	 if ($_SESSION['admin']=='ok'){
 	 	echo "session active";
$session='ok';
return $session;
 }}}