<?php
class Signal_class { 
	public function signal(){
					$content_onglet_titre="Signal";

		$session=sessionactive();
		if ($session=='ok'){
			$comment= new affichage();
			$table=$comment->spot_comment ();	
			if (!empty($table)){		
				require 'View/signal.view.php';
			} else {
				$content="Vous n'avez pas encore de commentaires !";
			}
		} else {
require 'View/erreur_404.php';
		}	$body= new Body_class;
		$body->body($content,$content_onglet_titre);
	}
}