<?php
	$arr = array(
		'Vixen' => array(
			'speed' => 8,
			'length' => 8,
			'rest' => 53
		),
		'Blitzen' => array(
			'speed' => 13,
			'length' => 4,
			'rest' => 49
		),
		'Rudolph' => array(
			'speed' => 20,
			'length' => 7,
			'rest' => 132
		),
		'Cupid' => array(
			'speed' => 12,
			'length' => 4,
			'rest' => 43
		),
		'Donner' => array(
			'speed' => 9,
			'length' => 5,
			'rest' => 38
		),
		'Dasher' => array(
			'speed' => 10,
			'length' => 4,
			'rest' => 37
		),
		'Comet' => array(
			'speed' => 3,
			'length' => 37,
			'rest' => 76
		),
		'Prancer' => array(
			'speed' => 9,
			'length' => 12,
			'rest' => 97
		),
		'Dancer' => array(
			'speed' => 37,
			'length' => 1,
			'rest' => 36
		)
	);
	$raceLength = 2503;
/**
 * Part 1
 */
	foreach($arr as $name => $attributes) {
		$time = 0;
		$distance = 0;
		while($time <= $raceLength) {
			for($i = 0; $i < $attributes['length']; $i++) {
				if($time <= $raceLength) {
					$distance += $attributes['speed'];
					$time++;
				}
				else {
					break;
				}
			}
			$time += $attributes['rest'];
		}
		echo 'distance ' . $name . ': ' . $distance . '<br>';
	}

/**
 * Part 2
 */
	$VixenArray = array();
	$BlitzenArray = array();
	$RudolphArray = array();
	$CupidArray = array();
	$DonnerArray = array();
	$DasherArray = array();
	$CometArray = array();
	$PrancerArray = array();
	$DancerArray = array();
	foreach($arr as $name => $attributes) {
		$distance = 0;
		$i = 0;
		while($i <= $raceLength) {
			for($j = 1; $j <= $attributes['length']; $j++) {
				$i++;
				if($i <= $raceLength) {
					$distance += $attributes['speed'];
					${$name.'Array'}[$i] = $distance;
				}
				
			}
			for($k = 1; $k <= $attributes['rest']; $k++) {
				$i++;
				if($i <= $raceLength) {
					${$name.'Array'}[$i] = $distance;
				}
				
			}
		}
	}

	$VixenScore = 0;
	$BlitzenScore = 0;
	$RudolphScore = 0;
	$CupidScore = 0;
	$DonnerScore = 0;
	$DasherScore = 0;
	$CometScore = 0;
	$PrancerScore = 0;
	$DancerScore = 0;

	for($i = 1; $i <= $raceLength; $i++) {
		$arr = array(
			'VixenScore' => $VixenArray[$i],
			'BlitzenScore' => $BlitzenArray[$i],
			'RudolphScore' => $RudolphArray[$i],
			'CupidScore' => $CupidArray[$i],
			'DonnerScore' => $DonnerArray[$i],
			'DasherScore' => $DasherArray[$i],
			'CometScore' => $CometArray[$i],
			'PrancerScore' => $PrancerArray[$i],
			'DancerScore' => $DancerArray[$i]
		);
		arsort($arr);
		reset($arr);
		$firstKey = key($arr);
		$nextKey = array_keys(array_slice($arr, 1, 1));
		$nextKey = $nextKey[0];

		$firstVal = current($arr);
		$nextVal = next($arr);

		${$firstKey}++;
		if($firstVal == $nextVal) {
			${$nextKey}++;
		}
	}
	echo 'Vixen: ' . $VixenScore . '<br>';
	echo 'Blitzen: ' . $BlitzenScore . '<br>';
	echo 'Rudolph: ' . $RudolphScore . '<br>';
	echo 'Cupid: ' . $CupidScore . '<br>';
	echo 'Donner: ' . $DonnerScore . '<br>';
	echo 'Dasher: ' . $DasherScore . '<br>';
	echo 'Comet: ' . $CometScore . '<br>';
	echo 'Prancer: ' . $PrancerScore . '<br>';
	echo 'Dancer: ' . $DancerScore . '<br>';