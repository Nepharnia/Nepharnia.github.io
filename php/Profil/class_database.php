<?php
	class database {
		
		private $db_name;
		private $db_user;
		private $db_pass;
		private $db_host;
		private $pdo;
		
	public function __construct($dbname, $dbuser = 'root', $dbpass = '', $dbhost='localhost'){
		$this->db_name=$dbname;
		$this->db_user=$dbuser;
		$this->db_pass=$dbpass;
		$this->db_host=$dbhost;
	}
	
	public function getPDO(){
		$pdo = new PDO("mysql:host=localhost;dbname=site_perso;charset=utf8", 'root', '');
		//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->pdo= $pdo;
		return $pdo;
	}
	
	public function query($statement){
		$req = $this->getPDO()->query($statement);
		$results = $req->fetch(PDO::FETCH_OBJ);
		return $results;
	}
	
	public function rowCount()
}
?>