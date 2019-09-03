<?php
namespace model ;

class Entity_Post_Model 
{
	private $id;
	private $title;
	private $body;
	


	public function getId() {
		return $this->id;
	}
	public function getTitle() {
		return $this->title;
	}
	public function getBody() {
		return $this->body;
	}
	public function setId($id) {
		$this->id=$id;
	}
	public function setTitle($title) {
		$this->title=$title;
	}
	public function setBody($body) {
		$this->body=$body;
	}
	public function hydratation ($donnée){
		$this->setTitle($donnée['title']);
		$this->setId($donnée['id']);
		$this->setBody($donnée['body']);

	}
}