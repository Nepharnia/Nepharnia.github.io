<?php 
session_start();
	//phpinfo(INFO_VARIABLES);
	require_once 'Class_Month.php';
	require_once 'Class_Events.php';
	require_once '../debugaide.php';
	
	$db = get_pdo();
	
	try {
		$month = new Month($_GET['month'] ?? null, $_GET['year'] ?? null); 
	} catch(Exception $e) {
		$month = new Month();
	}	
	$events = new Events($db);
	$start = $month->getStartingDay();
	$start = $start->format('N') === '1' ? $start : $month->getStartingDay()->modify('last monday');
	$weeks = $month->getWeeks();
	$end = (clone $start)->modify('+' .(6 + 7 * ($weeks - 1)) . 'days');
	//var_dump($end);
	$events = $events->getEventsBetweenByDay($start, $end);
	//var_dump($events);
	require '../header.php';
	?>
	<div id="calendar">
		<div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
			<div class="calendar__month"><h1><?= $month->toString(); ?></h1></div>
				<?php if (isset($_GET['success'])): ?>
					<div class="container">
						<div class="alert alert-success">
						L'évènement a bien été enregistré.
						</div>
					</div>
				<?php endif; ?>
				<?php if (isset($_GET['suppr'])): ?>
					<div class="container">
						<div class="alert alert-success">
						L'évènement a bien été supprimé.
						</div>
					</div>
				<?php endif; ?>
			<div>
				<a href="\php\Calendrier\calendrier.php?month=<?= $month->previousMonth()->month; ?>&year=<?= $month->previousMonth()->year ?>" class="btn btn-info">&lt;</a>
				<a href="\php\Calendrier\calendrier.php?month=<?= $month->nextMonth()->month; ?>&year=<?= $month->nextMonth()->year ?>" class="btn btn-info">&gt;</a>
			</div>
		</div>

		<table class="calendar__table calendar__table--<?= $weeks; ?>weeks">
			<?php for ($i = 0; $i < $weeks; $i++) {; ?>
			<tr>
				<?php 
				foreach($month->days as $k=>$day) {; 
					$date = (clone $start)->modify("+" .($k + $i * 7). 'days');
					$eventsForDay = $events[$date->format('Y-m-d')] ?? [];
					?>
				<td class="<?= $month->withinMonth($date) ? '' : "calendar__othermonth"; ?>">
					<?php if ($i===0) {; ?>
					<div class="calendar__weekday"><?= $day; ?></div>
					<?php }?>
					<div class="calendar__day"><?= $date->format('d'); ?></div>
					<?php foreach($eventsForDay as $event) {; ?>
						<div class ="calendar__event">
							<?= (new DateTime($event['start']))->format('H:i')?> - <a href="\php\Calendrier\edit.php?id=<?= $event['idAg']; ?>"><?= $event['event']; ?></a>
						</div>
					<?php } ?>
				</td>
				<?php }?>
			</tr>
			<?php } ?>
		</table>
	<a href="add.php" class="calendar__button">+</a>
	</div>
</body>
</html>
	
