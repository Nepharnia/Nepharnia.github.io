<?php

class Evenement {
	
	private $idAg;
	private $event;
	private $desc;
	private $lieu;
	private $start;
	private $end;
	private $user;
	private $idUsr;

/**
 * Getter
 */
public function getId(): int {
	return $this->idAg;
}
	
public function getName(): string {
	return $this->event;
}
	
public function getDescription(): string {
	return $this->desc ?? '';
}

public function getLieu(): string {
	return $this->lieu ?? '';
}
	
public function getStart(): \DateTime {
	return new \DateTime($this->start);
}
	
public function getEnd(): \DateTime {
	return new \DateTime($this->end);
}


public function getidUsr(): int {
	$db = get_pdo();
	$idUsr_req = "SELECT idUsr FROM authentification, avoir, user, infos WHERE loginUsr = '$this->user' AND idUsr = idUsrfk AND idA = idA_fk AND idUsr = idUsrfk ";
	$req_idUsr = $db->query($idUsr_req);
	$idUsr = $req_idUsr->fetchColumn();
	return $idUsr;
}

/**
 * Setter
 */

public function setName(string $event) {
	$this->event = $event;
}

public function setDesc(string $desc) {
	$this->desc = $desc;
}

public function setStart(string $start){
	$this->start = $start;
}

public function setEnd(string $end){
	$this->end = $end;
}

public function setLieu(string $lieu){
	$this->lieu = $lieu;
}
public function setUsr(string $user){
	$this->user = $user;
}

}