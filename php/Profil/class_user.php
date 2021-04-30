<?php
session_start();
try
{
	class user
	{
		private $_loginUsr;
		private $_emailUsr;
	 
		public function __construct($loginUsr, $emailUsr)
		{
			echo 'Classe User construite !';
			$this->_loginUsr = $loginUsr;
			$this->_emailUsr = $emailUsr;
		}
		
		public function AjouteUserBDD(){

			$db = new PDO("mysql:host=localhost;dbname=site_perso;charset=utf8", 'root', '')or die('could not connect to database');
	            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	            
	            $req_user = "INSERT INTO user(loginUsr, emailUsr) VALUES ('".$this->_loginUsr."','" .$this->_emailUsr."');";
				echo $req_user;
	            $db->exec($req_user);
	            echo 'User ajoutée dans la table';
	        }

		public function EffaceUserBDD(){

		}

		public function ModifUserBDD(){

		}
	}
}
catch (PDOException $e) {
	echo 'Échec lors de la connexion : ' . $e->getMessage();
}
?>	