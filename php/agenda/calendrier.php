<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="test/html; charset=UTF-8" />
		<title> Mon Calendrier</title>
		<link rel="stylesheet" type="text/css" href="/css/style_calendrier.css" />
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
		<script type="text/javascript">
					jQuery(function($){
						$('.month').hide();
						$('.month:first').show();
						$('.months a:first').addClass('active');
						var current = 1;
						('.months a').click(function(){
							var month = $(this).attr('id').replace('linkMonth','');
							if(month != current){
								$('month'+current).slideUp();
								$('month'+month).slideDown();
								$('.months a').removeClass('active');
								$('.months a#linkMonth'+month).addClass('active');
								current = month;
							}
							
							return false;
						});
					});
				</script>
	</head>
	<body>
		<?php
		require('date.php');
		$date= new Date();
		$year = date('Y');
		$dates = $date->getAll($year);
		?>
		<div class="periods">
			<div class="year"><?php echo $year; ?></div>
			<div class="months">
				<ul>
					<?php foreach ($date->months as $id=>$m) {?>
						<li><a href="#" id="linkMonth<?php echo $id+1; ?>"><?php echo utf8_encode(substr(utf8_decode($m),0,3)); ?></li>
					<?php }?>
				</ul>
			</div>
			<?php $dates = current($dates); ?>
			<?php foreach ($dates as $m => $days) {;?>
				<div class="month" id="month<?php echo $m; ?>">
				<table class="t1">
					<thead>
						<tr>
							<?php foreach ($date->days as $d) {; ?>
								<th><?php echo substr($d,0,3); ?></th>
							<?php }?>
						</tr>
						<div class ="clear"></div>
					</thead>
					<tbody>
						<tr>
						<?php $end = end($days); foreach ($days as $d => $w) {; ?>
							<?php if($d ==1 ) {;?>
								<td colspan="<?php echo $w-1; ?>"></td>
							<?php } ?>
							<td>
								<div class="relative">
									<div class="day"><?php echo $d; ?></div>
								</div>
							</td>
							<?php if($w == 7) {;?>
								</tr><tr>	
							<?php }?>								
							<?php if($end != 7) {;?>
								<td colspan="<?php echo 7-$end; ?>"class ="padding"</td>
							<?php } ?>
						<?php } ?>
						</tr>
					</tbody>
				</table>
				</div>
			<?php }?>
		<pre><?php print_r($dates); ?></pre>
	</body>
</html>