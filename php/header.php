<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<link rel="stylesheet" href="/css/calendar.css">
		<title><?= isset($title) ? h($title) : 'Calendrier' ?></title>
	</head>
	<body>
		
	<nav class="navbar navbar-dark bg-secondary mb-3">
		<a href="/php/Calendrier/calendrier.php" class="navbar-brand">Calendrier</a>
		<a href="/php/Profil/profil.php" class="navbar-brand">Retour au profil</a>
	</nav>