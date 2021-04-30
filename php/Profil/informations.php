<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="/css/style_profil.css" media="screen" type="text/css" />
		<title>Espace Personnel - Mes informations</title>
    </head>
    <body>
         <!-- tester si l'utilisateur est connecté -->
            <?php
                session_start();
                if($_SESSION['pseudo'] !== ""){
                    $user = $_SESSION['pseudo'];
                    // afficher un message
                    echo "Bonjour $user,";
					//phpinfo(INFO_VARIABLES);
                }
            ?>
            <a href="deconnexion.php"><input type="button" value="Déconnexion"></a>
            <br>
            <br>
            <?php
                try
                    {
                        //Récupération des données donnees_utilisateurs
                    $db = new PDO("mysql:host=localhost;dbname=site_perso;charset=utf8", 'root', '')or die('could not connect to database');

                    $loginUsr_req = "SELECT loginUsr FROM authentification, avoir, user, infos WHERE loginUsr = '$user' AND idUsr = idUsrfk AND idA = idA_fk AND idUsr = idUsrfk ";
                    $req_loginUsr = $db->query($loginUsr_req);
                    $loginUsr = $req_loginUsr->fetchColumn();

                    $emailUsr_req = "SELECT emailUsr FROM authentification, avoir, user, infos WHERE loginUsr = '$user' AND idUsr = idUsrfk AND idA = idA_fk AND idUsr = idUsrfk ";
                    $req_emailUsr = $db->query($emailUsr_req);
                    $emailUsr = $req_emailUsr->fetchColumn();


                    $nom_req = "SELECT nom FROM authentification, avoir, user, infos WHERE loginUsr = '$user' AND idUsr = idUsrfk AND idA = idA_fk AND idUsr = idUsrfk ";
                    $req_nom = $db->query($nom_req);
                    $nom = $req_nom->fetchColumn(); 

                    $prenom_req = "SELECT prenom FROM authentification, avoir, user, infos WHERE loginUsr = '$user' AND idUsr = idUsrfk AND idA = idA_fk AND idUsr = idUsrfk ";
                    $req_prenom = $db->query($prenom_req);
                    $prenom = $req_prenom->fetchColumn(); 

                    $adresse_req = "SELECT adresse FROM authentification, avoir, user, infos WHERE loginUsr = '$user' AND idUsr = idUsrfk AND idA = idA_fk AND idUsr = idUsrfk ";
                    $req_adresse = $db->query($adresse_req);
                    $adresse = $req_adresse->fetchColumn(); 

                    $cdpstl_req = "SELECT cdpstl FROM authentification, avoir, user, infos WHERE loginUsr = '$user' AND idUsr = idUsrfk AND idA = idA_fk AND idUsr = idUsrfk ";
                    $req_cdpstl = $db->query($cdpstl_req);
                    $cdpstl = $req_cdpstl->fetchColumn(); 

                    $ville_req = "SELECT ville FROM authentification, avoir, user, infos WHERE loginUsr = '$user' AND idUsr = idUsrfk AND idA = idA_fk AND idUsr = idUsrfk ";
                    $req_ville = $db->query($ville_req);
                    $ville = $req_ville->fetchColumn(); 


                    }
                catch (PDOException $e) {
                echo 'Échec lors de la connexion : ' . $e->getMessage();
                }
            ?>
                <form method="POST" class="profil">
						<legend><h1> Vos informations personnelles :</h1><legend>
                    <br>
                    <b><label>Voici votre login actuel : </label></b><?php echo "$loginUsr";?>
                    <input type = "text" id="newlogin" placeholder="Entrez votre nouveau login" name="newlogin"/>
                    <br>
                    <b><label>Voici votre adresse mail actuelle :</label></b><?php echo "$emailUsr";?>
                    <input type = "text" id="newmail" placeholder="Entrez votre nouveau mail" name="newmail"/>
                    <br>
                    <b><label>Voici le nom enregistré :</label></b><?php echo "$nom";?>
                    <input type = "text" id="newnom" placeholder="Entrez votre nouveau nom" name="newnom"/>
                    <br>
                    <b><label>Voici le prénom enregistré :</label></b><?php echo "$prenom";?>
                    <input type = "text" id="newprenom" placeholder="Entrez votre nouveau prénom" name="newprenom"/>
                    <br>
                    <b><label>Voici l'adresse enregistrée :</label></b><?php echo "$adresse";?>
                    <input type = "text" id="newadresse" placeholder="Entrez votre nouvelle adresse" name="newadresse"/>
                    <br>
                    <b><label>Voici le code postal enregistré :</label></b><?php echo "$cdpstl";?>
                    <input type = "text" id="newcdpstl" placeholder="Entrez votre nouveau code postal" name="newcdpstl"/>
                    <br>
                    <b><label>Voici la ville enregistrée :</label></b><?php echo "$ville";?>
                    <input type = "text" id="newville" placeholder="Entrez votre nouvelle ville" name="newville"/>
                    <br><br>
                    <input type="submit" name="Modification" value="Modifier mon profil"/>
            </form>     
            <?php
            if (isset($_POST['Modification'])){ 
                $newlogin = $_POST['newlogin']; //on récupère le nouveau login
                $newmail =  $_POST['newmail']; // on récupère le nouveau mail
                $newnom = $_POST['newnom'];// On récupère le nouveau nom
                $newprenom = $_POST['newprenom'];// On récupère le nouveau prénom
                $newadresse =  $_POST['newadresse']; // On récupère l'adresse
                $newcdpstl = $_POST['newcdpstl']; //On récupère le nouveau code postal
                $newville = $_POST['newville'];//On récupère la nouvelle ville
                //phpinfo(INFO_VARIABLES);
            
                $db = new PDO("mysql:host=localhost;dbname=site_perso;charset=utf8", 'root', '')or die('could not connect to database');
            
                $idUsr_req = "SELECT idUsr FROM authentification, avoir, user, infos WHERE loginUsr = '$user' AND idUsr = idUsrfk AND idA = idA_fk AND idUsr = idUsrfk ";
                $req_idUsr = $db->query($idUsr_req);
                $idUsr = $req_idUsr->fetchColumn();
                //echo $idUsr;
            
            
                if(!empty($newlogin)){
                    $requete_username = "SELECT count(*) FROM user WHERE idUsr = '$user'";
                    $exec_requete_username = $db->query($requete_username);
                    if($exec_requete_username->fetchColumn() > 0)
                        {
                            echo "Impossible, ce nom d'\utilisateur existe deja dans la base de données";
                        }
                    else{
                    $req_newlogin="UPDATE user SET loginUsr = '$newlogin' WHERE idUsr = $idUsr";
                    $newlogin_req = $db->query($req_newlogin);     
                        }
                    }
                if(!empty($newmail)){
                    $requete_mail = "SELECT count(*) FROM user WHERE emailUsr = '$newmail'";
                    $exec_requete_mail = $db->query($requete_mail);
                    if($exec_requete_mail->fetchColumn() > 0)
                    {
                        echo 'Impossible, cet email existe deja dans la base de données';
                    }
                    else{
                    $req_newmail="UPDATE user SET emailUsr = '$newmail' WHERE idUsr = $idUsr";
                    $newmail_req = $db->query($req_newmail);
                    }
                    }
                if(!empty($newnom)){
                    $req_newnom="UPDATE infos SET nom = '$newnom' WHERE idUsrfk = $idUsr";
                    $newnom_req = $db->query($req_newnom);
                    echo($newnom_req);     
                }
                if(!empty($newprenom)){
                    $req_newprenom="UPDATE infos SET prenom = '$newprenom' WHERE idUsrfk = $idUsr";
                    $newprenom_req = $db->query($req_newprenom);
                    echo($newprenom_req);     
                }
                if(!empty($newadresse)){
                    $req_newadresse="UPDATE infos SET adresse = '$newadresse' WHERE idUsrfk = $idUsr";
                    $newadresse_req = $db->query($req_newadresse); 
                }
                if(!empty($newcdpstl)){
                    $req_newcdpstl="UPDATE infos SET cdpstl = '$newcdpstl' WHERE idUsrfk = $idUsr";
                    $newcdpstl_req = $db->query($req_newcdpstl); 
                }
                if(!empty($newville)){
                    $req_newville="UPDATE infos SET ville = '$newville' WHERE idUsrfk = $idUsr";
                    $newville_req = $db->query($req_newville); 
                }
            }
            ?>          
		<br>
		<br>                                  
            <div id="suppression">
				Appuyer sur Supprimer mon profil pour supprimer votre compte et toutes vos données
                <a href="suppression.php"><input type="button" value="Supprimer mon profil"></a>
        </div>

			<div id="retour">
                <a href="profil.php" alt="Annuler">Retour à la page principale</a>
        </div>
		<br>
   </body>
</html>