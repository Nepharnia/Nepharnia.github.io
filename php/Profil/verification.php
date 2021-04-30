<?php
//require_once('class_database.php');
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    // connexion à la base de données
   $db = new PDO("mysql:host=localhost;dbname=site_perso;charset=utf8", 'root', '')or die('could not connect to database');
    $username = $_POST['username'];
    $password = $_POST['password'];
    //$password = crypt($POST['password']);

    if($username !== "" && $password !== "")

    $req_connexion = "SELECT user.loginUsr, authentification.passwordA FROM user, authentification, avoir  WHERE idUsr_fk = idUsr and idA_fk = idA and
            loginUsr = '".$username."' AND passwordA = '".$password."' ";
    echo $req_connexion;
    $result=$db->query($req_connexion);
    $reponse=$result->fetch(PDO::FETCH_ASSOC);
    $count=$result->rowCount();
	//$db = new database('site_perso');
	//$result = $db->query($req_connexion);
	//$count=$result->rowCount();

    if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
		$_SESSION['pseudo'] = $username;
		//phpinfo(INFO_VARIABLES);
        header('Location: /php/Profil/profil.php');
        }
        else 
        {
            header('Location: ../index.html'); // utilisateur ou mot de passe incorrect
        }
}
else
{
   header('Location: ../index.html');
}
?>