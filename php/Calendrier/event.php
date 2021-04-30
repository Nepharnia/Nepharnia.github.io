<?php
	require_once 'Class_Events.php';
	require_once '../debugaide.php';
	
	$db = get_pdo();
	
	$events = new Events($db);
	
	if (!isset($_GET['id'])) {
		header('location: 404.php');
	}
	/** 
	 *Essaye d'afficher l'event lié à l'id. Si introuvable => 404.php
	 */
try {
	$event = $events->find($_GET['id']);
} catch (Exception $e) {
	header('location : 404.php');
}
render('header', ['title'=> $event->getName()]);
?>

<h1><?= h($event->getName()); ?></h1>

<ul>
	<li>Date : <?= $event->getStart()->format('d/m/Y'); ?></li>
	<li>Heure de Début : <?= $event->getStart()->format('H:i'); ?></li>
	<li>Heure de Fin : <?= $event->getEnd()->format('H:i'); ?></li>
	<li>
		Description : <br>
		<?= h($event->getDescription()); ?>
	</li>
</ul>
</body>
</html>
