<?php
class dbb {
	private $user;
	private $servername;
	private $password;
	private $bddname;
	protected function connect(){
		$this->user = 'root';
		$this->servername = 'localhost';
		$this->password = '';
		$this->bddname = 'blog';
 $con= new mysqli ($this->servername,$this->user, $this->password, $this->bddname);
 return $con;

	}
}