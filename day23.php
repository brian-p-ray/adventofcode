<?php
	$registers = array(
		'a' => 0, // change to 1 for part 2
		'b' => 0
	);

	$instructions = file('day23.txt', FILE_IGNORE_NEW_LINES);
	$instructionLength = count($instructions);
	$i = 0;

	while($i < $instructionLength) {
		list($cmd, $param) = explode(' ', $instructions[$i], 2);
		// print_r($param);
		// echo '<br>';

		switch($cmd) {
			case 'hlf':
				$registers[$param] = (int)($registers[$param] / 2);
				$i++;
				break;
			case 'tpl':
				$registers[$param] = (int)($registers[$param] * 3);
				$i++;
				break;
			case 'inc':
				$registers[$param]++;
				$i++;
				break;
			case 'jmp':
				$i += intval($param);
				break;
			case 'jie':
				list($p1, $p2) = explode(', ',$param);
				if($registers[$p1] % 2 == 0) {
					$i+= intval($p2);
				}
				else {
					$i++;
				}
				break;
			case 'jio':
				list($p1, $p2) = explode(', ',$param);
				if($registers[$p1] == 1) {
					$i+= intval($p2);
				}
				else {
					$i++;
				}
				break;
		}
	}

	echo $registers['b'];