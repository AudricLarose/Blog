<?php

class Deco_class 
{
		public function deco (){
		$_SESSION['admin']= array();
		session_destroy();																		
	}

public function deconnecte(){
		$this->deco();
		header('location:index.php');
	}
  }