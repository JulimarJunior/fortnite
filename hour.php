<?php 
	date_default_timezone_set('America/Sao_Paulo');	
	$Date = date('Y-m-d 21:00');
	$hour_end = date_create(date('Y-m-d 21:00', strtotime($Date. ' + 1 days')));
	$hour_start = date_create(date('d-m-Y H:i'));

	$interval = date_diff($hour_start, $hour_end);

	$interval = (get_object_vars($interval));

	if(strlen($interval['i']) < 2) {
		$interval['i'] = '0'.$interval['i'];
	}

	if(strlen($interval['h']) < 2) {
		$interval['h'] = '0'.$interval['h'];
	}

	echo ($interval['h'].':'.$interval['i']);
