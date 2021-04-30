<!DOCTYPE html>
<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="/style.css" media="screen" type="text/css" />
    </head>
    <body>
    	<div id="inscription">

            <form action="enregistrement.php" method="POST">
                <h2>Inscription</h2>
                <label><b> Nom:</b></label>
                <br>
                <input type="text" placeholder="Entrer votre nom" name="name"required/>
				<br>
                <label><b> Prénom:</b></label>
                <br>
                <input type="text" placeholder="Entrer votre prénom" name="prenom"required/>
                <br>
				<label><b> Email:</b></label>
                <br>
                <input type="email" placeholder="Entrer votre email" name="email"required/>
                <br>
                <label><b> Adresse:</b></label>
                <br>
                <input type="text" placeholder="Entrer votre adresse" name="adresse"required/>
				<br>
                <label><b> Code Postal:</b></label>
                <br>
                <input type="text" placeholder="Entrer votre code postal" name="cdpstl"required/>
				<br>
                <label><b> Ville:</b></label>
                <br>
                <input type="text" placeholder="Entrer votre ville" name="ville" required/>
				<br>
                <label><b> Date de Naissance:</b></label>
                <input type="date" placeholder="Entrer votre date de naissance" name="ddn"required/>
                <br>
                <label><b> Lieu de Naissance:</b></label>
                <input type="text" placeholder="Entrer votre lieu de naissance" name="ldn"required/>
				<br>
                <label><b> Nationalité:</b></label>
                <input type="text" placeholder="Entrer votre nationalité" name="nationalite"required/>
				<br>
                <label><b> Username:</b></label>
                <input type="text" placeholder="Entrer votre identifiant" name="username"required/>
				<br>
                <label><b> Mot de passe:</b></label>
                <input type="password" title='1 Majuscule, 1 Minuscule, 1 Chiffre, 1 Caractère spécial, 10 caractères MINIMUM' placeholder="Entrer votre mot de passe" name="password" required/></br></br>
                <input type="submit" name="Inscription" class="boutonvalidation" value="INSCRIPTION">
                <a href="/index.html"><input type="button" class="boutonaccueil" value="Page d'accueil"></a>
            </form>
        </div>
		<footer>
            <div id="bas_page">
				<a href="/html/contact.html">Contact</a>
            </div> 
		</footer>
    </body>
	</body>
</html>