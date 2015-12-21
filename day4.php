<?php
	set_time_limit(3600);
	$key = 'yzbqklnj';

	// part 1
	$i = 1;

	while (true) {
		$hash = md5($key.$i);

		if(substr($hash, 0, 5) === '00000') {
			// echo $i;
			break;
		}
		$i++;
	}

	// part 2
	$i = 1;
	
	while (true) {
		$hash = md5($key.$i);

		if(substr($hash, 0, 6) === '000000') {
			echo $i;
			break;
		}
		$i++;
	}