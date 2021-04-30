<?php
	class infos
	{
		private $_nom;
		private $_prenom;
		private $_adresse;
		private $_cdp;
		private $_ville;
		private $_ddn;
		private $_ldn;
		private $_nationalite;
		private $_dernier_id_user;

	 
		public function __construct($nom, $prenom, $adresse, $cdp, $ville, $ddn, $ldn, $nationalite, $dernier_id_user)
		{
			echo 'Classe Infos construite !';
			$this->_nom=$nom;
			$this->_prenom=$prenom;
			$this->_adresse=$adresse;
			$this->_cdp=$cdp;
			$this->_ville=$ville;
			$this->_ddn=$ddn;
			$this->_ldn=$ldn;
			$this->_nationalite=$nationalite;
			$this->_dernier_id_user=$dernier_id_user;
		}
		
		public function AjouteInfosBDD(){

			$db = new PDO("mysql:host=localhost;dbname=site_perso;charset=utf8", 'root', '')or die('could not connect to database');
	            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	            
	            $req_infos = "INSERT INTO infos(nom, prenom, adresse, cdpstl, ville, datenaiss, lieunaiss, nationalite, idUsrfk) VALUES
					('".$this->_nom."', '".$this->_prenom."', '".$this->_adresse."', ".$this->_cdp.", '".$this->_ville."', '".$this->_ddn."', '".$this->_ldn."', '".$this->_nationalite."', '".$this->_dernier_id_user."');";
	            $db->exec($req_infos);
				echo $req_infos;
	            echo 'Infos ajoutée dans la table';
	        }
			
		public function EffaceInfosBDD(){

		}

		public function ModifInfosBDD(){

		}
	}

?>