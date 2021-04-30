<?php

function connexion() {
	
	$db=new PDO("mysql:host=localhost;dbname=site_perso;charset=utf8", 'root', '')or die('could not connect to database');
}
?>