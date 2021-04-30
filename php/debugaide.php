<?php

 	/**
 	 *Fonction de débuggage
  	 */
	function dg(...$vars) {
		foreach($vars as $var) {
			echo '<pre>';
			print_r($var);
			echo '</pre>';
		}
	}	

	/**
	 *Fonction pour éviter de répéter PDO
	 */

	function get_pdo() : PDO {
		return new \PDO("mysql:host=localhost;dbname=site_perso;charset=utf8", 'root', '', [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
	}
	
	/**
	 *Permet d'afficher une variable avec des balises html sans prendre en compte le html
	 */

	function h(?string $value) : string {
		if ($value === null) {
			return '';
		}
		return htmlentities ($value);
	}

	function render(string $view, $parameters = []) {
		extract($parameters);
		include "../{$view}.php";
	}

?>