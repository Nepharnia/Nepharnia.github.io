<?php
    session_start();
    if($_SESSION['pseudo'] !== ""){
        $user = $_SESSION['pseudo'];

            $db = new PDO("mysql:host=localhost;dbname=site_perso;charset=utf8", 'root', '')or die('could not connect to database');

			$idUsr=$db->exec('call recup_idUser(" . $user . "," . $idUsr . ")');
			$idA=$db->exec('call recup_idA(" . $user . "," . $idA . ")');
            //On récupère l'idUsr de l'utilisateur
            //$idUsr_req = "SELECT idUsr FROM authentification, avoir, user, infos WHERE loginUsr = '$user' AND idUsr = idUsrfk AND idA = idA_fk AND idUsr = idUsrfk ";
            //$req_idUsr = $db->query($idUsr_req);
            //$idUsr = $req_idUsr->fetchColumn();
			//$req_idUsr = $db->exec('call recup_idUsr('$user')');
			//$idUsr = $req_idUsr->fetchColumn();

            //$idA_req = "SELECT idA FROM authentification, avoir, user, infos WHERE loginUsr = '$user' AND idUsr = idUsrfk AND idA = idA_fk AND idUsr = idUsrfk ";
            //$req_idA = $db->query($idA_req);
            //$idA = $req_idA->fetchColumn();
			//$req_idA = $db->exec('call recup_idA('$user')');
			//$idA = $req_idA->fetchColumn();

			
            //on supprime les données de avoir
            $supp_avoir_req = "DELETE FROM avoir WHERE idUsr_fk = $idUsr";
            $req_supp_avoir = $db->query($supp_avoir_req);

            //On supprime les données authentification
            $supp_authentification_req = "DELETE FROM authentification WHERE idA = $idA";
            $req_supp_authentification = $db->query($supp_authentification_req);

            //On supprime les données de infos
            $supp_infos_req = "DELETE FROM infos WHERE idUsrfk = $idUsr";
            $req_supp_infos = $db->query($supp_infos_req);

            session_destroy();
            header('Location: login.php');
            
            //On supprime les données de user
            $supp_user_req = "DELETE FROM user WHERE idUsr = $idUsr";
            $req_supp_user = $db->query($supp_user_req);

        }

?>        

