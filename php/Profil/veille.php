<?php
session_start();
//phpinfo(INFO_VARIABLES);
	if (isset($_SESSION['pseudo']))
	{
		echo '<h3>';
		echo 'Bienvenue sur votre profil, ' . $_SESSION['pseudo'];
		echo '</h3>';
	}

?>  
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="/css/style_profil.css" />
        <title>Veille Technologique</title>
    </head>
	<body>
		<div id="flux_rss">
				<h2>Flux RSS sur l'IA</h2>
				<!-- DEBUT CODE MISE EN PAGE XML PAR ACTIFPUB V2 -->      
				  <SCRIPT language="Javascript" charset="ISO-8859-1"> 
				 var member=""; //optionnel si vous etes inscrit sur la plateforme actifpub  le parametrage se fait dans votre espace membre 
				 var fichier="https://news.google.com/news/rss/search/section/q/intitle%3A%22Intelligence%20Artificielle%22/?&hl=fr&gl=fr&scoring=n&num=50"; 
				 var limite="1";  //  sujets compris entre 1 
				 var limite1="5";   //  et plus  
				  var aspect="1";  //  0 ou 1 (1 permet d'afficher lien + description, 0 que les liens)  
				 var minute="1";  //  0 ou 1 (1 permet d'afficher date et heure, 0 pas de date et heure) 
				 var sujet="0"; //  0 ou 1 (1 permet d'afficher le titre des sujets traités, 0 pas de titre )  
				 var te="Tahoma, Verdana";  // Police de caractères (Verdana, arial etc...) 
				 var fil_textsize="13"; // taille des liens et description 
				 var title_textcolor="464646"; // couleur des liens (000000 donne noir)  
				 var tlien="none"; // style du lien none ou underline  
				 var text_textcolor="000000";  // couleur description (000000 donne noir) 
				 var frame_color="ECF3F3"; // couleur arrière plan (FFFFFF donne blanc) 
				 var content="1"; // 0 ou 1 comme paramètre optionnel, 1  format html,  0  format texte 
				 var extract="";  // laisser vide ou indiquez le nombre de caractères que vous souhaitez garder dans le corps du flux 
				 var cache="15"; // gestion du cache exprimée en minutes - en fonction de la fréquence de mise à jour 
				  document.write('<s'+'cript language="JavaScript" charset="ISO-8859-1" type="text/javascript" SRC="http://www.actifpub.com/rss.php?fichier_AP_='+fichier+'&limite_AP_='+limite+'&limite1_AP_='+limite1+'&aspect_AP_='+aspect+'&minute_AP_='+minute+'&sujet_AP_='+sujet+'&te_AP_='+te+'&fil_textsize_AP_='+fil_textsize+'&title_textcolor_AP_='+title_textcolor+'&text_textcolor_AP_='+text_textcolor+'&frame_color_AP_='+frame_color+'&content_AP_='+content+'&cache_AP_='+cache+'&extract_AP_='+extract+'&tlien_AP_='+tlien+'&java=1&member_AP_='+member+'"></sc'+'ript>'); 
				  </script>  
			</div>
			<div id="flux_rss_OS">
				<h2>Flux RSS sur le Transhumanisme<br></h2>
				<!-- DEBUT CODE MISE EN PAGE XML PAR ACTIFPUB V2 -->      
				  <SCRIPT language="Javascript" charset="ISO-8859-1"> 
				 var member=""; //optionnel si vous etes inscrit sur la plateforme actifpub  le parametrage se fait dans votre espace membre 
				 var fichier="https://news.google.com/news/rss/search/section/q/intitle%3A%22Transhumanisme%22%20/?&hl=fr&gl=fr&scoring=n&num=50					"; 
				 var limite="1";  //  sujets compris entre 1 
				 var limite1="5";   //  et plus  
				  var aspect="1";  //  0 ou 1 (1 permet d'afficher lien + description, 0 que les liens)  
				 var minute="1";  //  0 ou 1 (1 permet d'afficher date et heure, 0 pas de date et heure) 
				 var sujet="0"; //  0 ou 1 (1 permet d'afficher le titre des sujets traités, 0 pas de titre )  
				 var te="Tahoma, Verdana";  // Police de caractères (Verdana, arial etc...) 
				 var fil_textsize="13"; // taille des liens et description 
				 var title_textcolor="464646"; // couleur des liens (000000 donne noir)  
				 var tlien="none"; // style du lien none ou underline  
				 var text_textcolor="000000";  // couleur description (000000 donne noir) 
				 var frame_color="ECF3F3"; // couleur arrière plan (FFFFFF donne blanc) 
				 var content="1"; // 0 ou 1 comme paramètre optionnel, 1  format html,  0  format texte 
				 var extract="";  // laisser vide ou indiquez le nombre de caractères que vous souhaitez garder dans le corps du flux 
				 var cache="15"; // gestion du cache exprimée en minutes - en fonction de la fréquence de mise à jour 
				  document.write('<s'+'cript language="JavaScript" charset="ISO-8859-1" type="text/javascript" SRC="http://www.actifpub.com/rss.php?fichier_AP_='+fichier+'&limite_AP_='+limite+'&limite1_AP_='+limite1+'&aspect_AP_='+aspect+'&minute_AP_='+minute+'&sujet_AP_='+sujet+'&te_AP_='+te+'&fil_textsize_AP_='+fil_textsize+'&title_textcolor_AP_='+title_textcolor+'&text_textcolor_AP_='+text_textcolor+'&frame_color_AP_='+frame_color+'&content_AP_='+content+'&cache_AP_='+cache+'&extract_AP_='+extract+'&tlien_AP_='+tlien+'&java=1&member_AP_='+member+'"></sc'+'ript>'); 
				  </script>  
			</div>
	<div id="droite">
		<nav class="profil_perso">
			<li><a href="deconnexion.php"><input type="button" value="Déconnexion"></a></li>
		</nav>
		<div id="twitter">
			<a class="twitter-timeline" href="https://twitter.com/nepharnia/lists/veille-tech?ref_src=twsrc%5Etfw">A Twitter List by nepharnia</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
		</div>
	</div>
    </body>
</html>