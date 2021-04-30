<?php
require 'class_infos.php';
require 'class_user.php';
require 'class_authentification.php';
require 'class_avoir.php';
//phpinfo(INFO_VARIABLES);


	// On se place sur le bon formulaire grâce au "name" de la balise "input"
		if (isset($_POST['Inscription'])){	
		$nom = $_POST['name'];
		$prenom =  $_POST['prenom']; // on récupère le prénom
		$email = $_POST['email'];// On récupère le mail
		$adresse =  $_POST['adresse']; // On récupère l'adresse
		$cdp = $_POST['cdpstl'];
		$ville = $_POST['ville'];
		$ddn = $_POST['ddn']; // On récupère la date de naissance
		$ldn = $_POST['ldn'];
		$nationalite = $_POST['nationalite'];
		$username = $_POST['username']; //  On récupère le nom d'utilisateur
		$password = $_POST['password']; // On récupère le mot de passe 

		$valid = true;

			$db = new PDO("mysql:host=localhost;dbname=site_perso;charset=utf8", 'root', '')or die('could not connect to database');
			$req = $db->query("show table status where name='authentification'");
			$res = $req->fetch(PDO::FETCH_ASSOC);
			$dernier_id = $res['Auto_increment'];

			$reqs = $db->query("show table status where name='user'");
			$ress = $reqs->fetch(PDO::FETCH_ASSOC);
			$dernier_id_user = $ress['Auto_increment'];

		
		//  Vérification du nom
		if(empty($nom)){
			$valid = false;
			$nom = ("Le nom ne peut pas être vide");
			}

		//  Vérification du prénom
		if(empty($prenom)){
			$valid = false;
			$prenom = ("Le prenom ne peut pas être vide");
			}

		// Vérification du mail
		if(empty($email)){
			$valid = false;
			$email = ("Le mail ne peut pas être vide");

		// On vérifie que le mail est dans le bon format
			}
		elseif(!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z0-9\-_.]{2,3}$/i", $email)){
			$valid = false;
			$email = ("Le mail n'est pas valide");

			}
		else{
			// On vérifie que le mail est disponible

			$requete = "SELECT count(*) FROM user WHERE emailUsr = '$email'";
			$exec_requete = $db->query($requete);
				if($exec_requete->fetchColumn() > 0)
					{
						$valid = false;
						echo 'Impossible, cet email existe deja dans la base de données';
					}
			}
		//  Vérification de l'adresse
		if(empty($adresse)){
			$valid = false;
			$adresse = ("L'adresse ne peut pas être vide");
			}

		//  Vérification du code postal
		if(empty($cdp)){
			$valid = false;
			$cdp = ("Le code postal ne peut pas être vide");
			}

		//  Vérification de la ville
		if(empty($ville)){
			$valid = false;
			$ville = ("La ville ne peut pas être vide");
			}

		//  Vérification de la date de naissance
		if(empty($ddn)){
			$valid = false;
			$ddn = ("La date de naissance ne peut pas être vide");
			}

		//  Vérification du lieu de naissance
		if(empty($ldn)){
			$valid = false;
			$ldn = ("Le lieu de naissance ne peut pas être vide");
			}

		//  Vérification de la nationalité
		if(empty($nationalite)){
			$valid = false;
			$nationalite = ("La nationalité ne peut pas être vide");
			}

		//  Vérification du nom d'utilisateur 
		if(empty($username)){
			$valid = false;
			$username = ("Le nom d'utilisateur ne peut pas être vide");
			}
		else{
			$requete_username = "SELECT count(*) FROM user WHERE idUsr = '$username'";
			$exec_requete_username = $db->query($requete_username);
				if($exec_requete_username->fetchColumn() > 0)
					{
						return $valid = false;
						echo $valid;
						echo "Impossible, ce nom d'\utilisateur existe deja dans la base de données";
					}
			}

		// Vérification du mot de passe
		if(empty($password)) {
			$valid = false;
			$password = "Le mot de passe ne peut pas être vide";
			}
		if(strlen($password) < 10) {
			echo "Mot de passe trop court ! 10 caractères minimum";
			$valid = false;
			}
		if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $password)) {
			echo 'Mot de passe conforme';
			//$password= crypt($password);
			}

		else {
			echo 'Mot de passe non conforme';
			$valid = false;
			}

		}

		// Si toutes les conditions sont remplies alors on fait le traitement
		if($valid == true){

			// On insert nos données dans la table utilisateur à l'aide des classes
			date_default_timezone_set('UTC');
			$date_creation_compte = date('Y-m-d');

			$utilisateur= new user($username, $email);
			$utilisateur -> AjouteUserBDD();
			
			$informations= new infos($nom, $prenom, $adresse, $cdp, $ville, $ddn, $ldn, $nationalite, $dernier_id_user);
			$informations -> AjouteInfosBDD();
			
			$authentification= new authentification($password, $date_creation_compte);
			$authentification -> AjouteAuthBDD();

			$av= new avoir($dernier_id_user, $dernier_id);
			$av -> AjouteAvoirBDD();

			echo 'Votre compte est créé';
			header('Location: /html/profil.php');
			exit;
			}
?>