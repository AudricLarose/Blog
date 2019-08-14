

<?php 
require './Model/model.php';

class controller {

	public function session_go (){
		session_start();
	}

	public function pages ($error,$success){
					$content_onglet_titre="Chapitres";

		try {

			$id=$_GET["id"];

			switch ($error) {
				case 'champs_vide':
				$content_formu= " il faut remplir les champs avant de valider";
				break;
				case ' ':
				$content_formu= " ";
				break;
				}
				switch ($success) {
				case 'valide':
				$content_success= " Votre message a bien été validé";
				break;
				case 'signaler':
				$content_success= " Ce commentaire a bien été signalé";
				break;
				case ' ':
				$content_success= " ";
				break;
				}
			$menus= new affichage;
			$bloc_text_titres = $menus->lecture('posts4');
			if ($bloc_text_titres){
				$comment=new affichage;
				$commentaires= $comment->show_comment();
				require 'View/pagecom.view.php';
				$this->body($content,$content_onglet_titre);;} else {
					throw new Exception("Impossible d'afficher la page car elle ne figure pas sur la base de données");

				}
			} catch (Exception $e){
				$content = $e->getMessage();
				$action= new controller;
				$this->body($content,$content_onglet_titre);;
			}


		}

		public function admin ($error){
			$content_onglet_titre="Admin connection";
			$session=sessionactive();
			try {
				if (!isset($session)){
					if (!isset($error)) {$content_admin= " ";
				}
				else {
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
$this->body($content,$content_onglet_titre);			}
			else {
				header('location:index.php');
			}
		} catch (Exception $e){
			$content = $e->getMessage();
$this->body($content,$content_onglet_titre);		}
	}

	public function index (){
					$content_onglet_titre="Index";
		$bdd_data= new affichage;
		$posts_datas=$bdd_data->spot('posts4');
		require 'View/accueil.view.php';
		$this->body($content,$content_onglet_titre);
	}

	public function body ($content_body,$content_onglet_titre){
		$session=sessionactive();
		if ($session=='ok'){
			$content_invite_admin='  Bonjour, Monsieur Forteroche.';
		} else {
			$content_invite_admin='  Bonjour, invité.';
		}
		$bdd_data= new affichage;
		$posts_datas=$bdd_data->spot('posts4');
		$additions=$bdd_data->addition('signalement','commentaire');
		require "View/template.view.php";
	}

	public function deconnecte(){
		$paragraphe=new affichage;
		$paragraphe->deco();
		header('location:index.php');
	}

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
		}
		$this->body($content,$content_onglet_titre);;
	}

	public function ecriture ($a,$b,$success){
					$content_onglet_titre="Creation";

		$session=sessionactive();
		if ($session=='ok'){
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

			if ($a!==0){
				$brouill= new affichage;
				$x=$brouill->lecture($b);
				$xt=$x[0]["title"];
				$xb=$x[0]["body"];
			} elseif ($a===0) {
				$xt= ' ';
				$xb= ' ';
			}
			$brouill= new affichage;
			$brouillon=$brouill->spot('brouillon');

			if (isset($brouillon)){
				require 'View/brouillon.admin.view.php';

			} else  {
				$content_brouillon='pas de brouillon';
			}
			require 'View/ecriture.view.php'; 
		} else {
require 'View/erreur_404.php';

		}
				$this->body($content,$content_onglet_titre);;

	}
}
$action= new controller;
$action->session_go ();
