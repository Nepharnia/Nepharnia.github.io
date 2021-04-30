<?php
session_start();
$user = $_SESSION['pseudo'];
//phpinfo(INFO_VARIABLES);
require_once '..\debugaide.php';
require_once 'Class_Eventvalidator.php';
require_once 'Class_Events.php';
require_once 'Class_Evenement.php';

render('header', ['title' => 'Ajouter un évènement']);

$data = [];
$errors = [];

if($_SERVER['REQUEST_METHOD'] === 'POST') {
	$data = $_POST;
	$errors = [];
	$validator = new Eventvalidator();
	$errors = $validator->validates($_POST);
	if (empty($errors)) {
		$event = new Evenement();
		$event->setName($data['event']);
		$event->setDesc($data['desc']);
		$event->setStart(DateTime::createFromFormat('Y-m-d H:i', $data['date']. ' '. $data['debut'])->format('Y-m-d H:i:s'));
		$event->setEnd(DateTime::createFromFormat('Y-m-d H:i', $data['date']. ' '. $data['fin'])->format('Y-m-d H:i:s'));
		$event->setLieu($data['lieu']);
		$event->setUsr($user);
		$events = new Events(get_pdo());
		$events->create($event);
		header('Location: /php/Calendrier/calendrier.php?success=1');
		exit();
	}
}

?>


<div class= "container">
	<?php if (!empty($errors)): ?>
		<div class="alert alert-danger">
		Merci de bien vouloir corriger vos erreurs.
		</div>
	<?php endif; ?>

		<h1>Ajouter un évènement</h1>
		<form action="" method="post" class="form">
			<?php render('form', ['data' => $data, 'errors' => $errors]); ?>
			<div class="form-group">
				<button class="btn btn-secondary">Ajouter à votre calendrier</button>
			</div>
		</form>
</div>