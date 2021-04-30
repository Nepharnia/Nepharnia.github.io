<?php
session_start();
//phpinfo(INFO_VARIABLES);
	if (isset($_SESSION['pseudo']))
	{
		echo '<h2>';
		echo 'Bienvenue sur votre profil, ' . $_SESSION['pseudo'];
		echo '</h2>';
	}

?>  
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="/css/style_profil.css" />
        <title>Espace Personnel</title>
    </head>
	<header>
	<div id="droite">
		<nav class="profil_perso">
			<li><a href="deconnexion.php"><input type="button" value="Déconnexion"></a></li>
		</nav>
	</div>
	</header>
        <div id="accueil" style="line-height: 65px;">
		<div id="menu_case" style="margin-left: 20px;">
			<div id="mes_informations"><a href="informations.php"><img src='/images/informations.png'></a></div>
			<div id="resume"><a href="veille.php"><img src="/images/veille.png"></a></div>
			<div id="calendrier"><a href="../Calendrier/calendrier.php"><img src="/images/calendrier.png"></a></div>
			<div id="memo"><a href="https://keep.google.com/u/0/#label/M%C3%A9mo%20Site"><img src="/images/memo.png" ></a></div>
			<div id="retouraccueil"><a href="/index.html"><img src="/images/accueil.png" style="margin-top: 30px"></a></div>
        </div>
    </body>
</html>