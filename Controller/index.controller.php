<?php
class Index_class
{
		public function extrait($x,$y){

		$extr = explode(' ', "$x",$y);
		$extr[$y-1]=" ";
		$extrait=implode(" ", $extr);
		return $extrait;
	}
		public function index (){
		$content_onglet_titre="Index";
		$bdd_data= new affichage;
		$posts_datas=$bdd_data->spot('posts4');

		require 'View/accueil.view.php';
			$body= new Body_class;
			$body->body($content,$content_onglet_titre);
	}
}