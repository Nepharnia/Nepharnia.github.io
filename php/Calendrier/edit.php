<?php
	require_once 'Class_Events.php';
	require_once 'Class_Eventvalidator.php';
	require_once '../debugaide.php';
	
	$db = get_pdo();
	
	$events = new Events($db);
	$errors = [];
	
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
	$data = [
		'event' => $event->getName(),
		'date' => $event->getStart()->format('Y-m-d'),
		'debut' => $event->getStart()->format('H:i'),
		'fin' => $event->getEnd()->format('H:i'),
		'desc' => $event->getDescription(),
		'lieu' => $event->getLieu()
	];

	if($_SERVER['REQUEST_METHOD'] === 'POST') {
		$data = $_POST;
		$validator = new Eventvalidator();
		$errors = $validator->validates($data);
		if (empty($errors)) {
			$event->setName($data['event']);
			$event->setDesc($data['desc']);
			$event->setStart(DateTime::createFromFormat('Y-m-d H:i', $data['date']. ' '. $data['debut'])->format('Y-m-d H:i:s'));
			$event->setEnd(DateTime::createFromFormat('Y-m-d H:i', $data['date']. ' '. $data['fin'])->format('Y-m-d H:i:s'));
			$event->setLieu($data['lieu']);
			$events->update($event);
			header('Location: /php/Calendrier/calendrier.php?success');
			exit();
		}
	}
	if(isset($_POST['suppression'])) {
		$events->delete($event);
		header('Location: /php/Calendrier/calendrier.php?suppr');
		exit();
	}
?>

<div class="container">
<h1>Editer l'évènement <small><?= h($event->getName()); ?></small></h1>
	<form action="" method="post" class="form">
		<?php render('form', ['data' => $data, 'errors' => $errors]); ?>
			<div class="form-group">
				<button class="btn btn-secondary">Modifier l'évènement</button>
			</div>
	</form>	
	<form id="suppression" method="post">
		<div class ="form-group">
			<button class="btn btn-secondary" name="suppression" value="suppression">Supprimer l'évènement</button>	
		</div>
	</form>
</div>


