<?php
	class authentification
	{
		private $_password;
		private $_date_creation;


	 
		public function __construct($password,$date_creation_compte)
		{
			echo 'Classe Authentification construite !';
			$this->_password=$password;
			$this->_date_creation=$date_creation_compte;
		}
		
		public function AjouteAuthBDD(){

				$db = new PDO("mysql:host=localhost;dbname=site_perso;charset=utf8", 'root', '')or die('could not connect to database');
	            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	            
	            $req_auth = "INSERT INTO authentification(passwordA, dateA) VALUES ('".$this->_password."', '".$this->_date_creation."');";
	            $db->exec($req_auth);
	            echo $req_auth;
	            echo 'Auth ajoutée dans la table';
	        }

		public function EffaceAuthBDD(){
			
	
		}

		public function ModifAuthBDD(){

		}
	}
?>	