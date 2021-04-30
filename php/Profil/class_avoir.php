<?php
	class avoir
	{
		private $_der_id_user;
		private $_der_id;
		private $_idUsr

	 
		public function __construct($dernier_id_user, $dernier_id)
		{
			echo 'Classe avoir construite !';
			$this->_der_id_user=$dernier_id_user;
			$this->_der_id=$dernier_id;
		}
		
		public function AjouteAvoirBDD(){
				$db = new PDO("mysql:host=localhost;dbname=site_perso;charset=utf8", 'root', '')or die('could not connect to database');
	            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	            
	            $req_av = "INSERT INTO avoir(idUsr_fk, idA_fk) VALUES ('".$this->_der_id_user."', '".$this->_der_id."');";
	            $db->exec($req_av);
	            echo $req_av;
	            echo 'Avoir ajoutée dans la table';
	        }

		public function EffaceAvoirBDD(){

		}

		public function ModifAvoirBDD(){

		}
	}
session_destroy();
?>	