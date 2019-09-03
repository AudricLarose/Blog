<?php
namespace model ;

class Entity_Comment_Model 
{
	private $id;
	private $date;
	private $auteur;
	private $mail;
	private $commentaire;
	private $signalement;
	private $id_comment;
	
	public function getId() {
		return $this->id;
	}
	public function getDate() {
		return $this->date;
	}
	public function getAuteur() {
		return $this->auteur;
	}
	public function getMail() {
		return $this->mail;
	}
	public function getCommentaire() {
		return $this->commentaire;
	}
	public function getSignalement() {
		return $this->signalement;
	}
	public function getIdComment() {
		return $this->id_comment;
	}
	public function setId($id) {
		$this->id=$id;
	}
	public function setDate($date) {
		$this->date=$date;
	}
	public function setAuteur($auteur) {
		$this->auteur=$auteur;
	}
	public function setMail($mail) {
		$this->mail=$mail;
	}
	public function setCommentaire($commentaire) {
		$this->commentaire=$commentaire;
	}
	public function setSignalement($signalement) {
		$this->signalement=$signalement;
	}
	public function setIdComment($id_comment) {
		$this->id_comment=$id_comment;
	}
	public function hydratation ($donnée){
		$this->setDate($donnée['date']);
		$this->setId($donnée['id']);
		$this->setAuteur($donnée['auteur']);
		$this->setMail($donnée['mail']);
		$this->setCommentaire($donnée['commentaire']);
		$this->setSignalement($donnée['signalement']);
		$this->setIdComment($donnée['id_comment']);
	}
}