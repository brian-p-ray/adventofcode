<?php

$arr = array();
$descriptors = array(
	'children' => 3,
	'cats' => 7,
	'samoyeds' => 2,
	'pomeranians' => 3,
	'akitas' => 0,
	'vizslas' => 0,
	'goldfish' => 5,
	'trees' => 3,
	'cars' => 2,
	'perfumes' => 1
);
// create array of aunts
foreach (file('day16.txt', FILE_IGNORE_NEW_LINES) as $line) {
	list ($a,$number,$type1,$count1,$type2,$count2,$type3,$count3) = explode(' ', $line);
	$number = str_replace(':', '', $number);
	$type1 = str_replace(':', '', $type1);
	$type2 = str_replace(':', '', $type2);
	$type3 = str_replace(':', '', $type3);
	$count1 = str_replace(',', '', $count1);
	$count2 = str_replace(',', '', $count2);
	$count3 = str_replace(',', '', $count3);

	$arr[$number] = array(
		$type1 => $count1,
		$type2 => $count2,
		$type3 => $count3
	);
}

$outArr = array();
// part 1 loop
foreach($descriptors as $descriptor => $count) {
	foreach($arr as $key => $val) {
		// echo $val[$descriptor] . '<br>';
		if(!array_key_exists($descriptor, $val) || $val[$descriptor] == $count) {
			array_push($outArr, $key);
		}
	}
}

// part 2 loop
foreach($descriptors as $descriptor => $count) {
	foreach($arr as $key => $val) {
		if(!array_key_exists($descriptor, $val)) {
			array_push($outArr, $key);
		}
		if($descriptor != 'cats' && $descriptor != 'trees' && $descriptor != 'pomeranians' && $descriptor != 'goldfish' && $val[$descriptor] == $count) {
			array_push($outArr, $key);
		}
		if(($descriptor == 'cats' || $descriptor == 'trees') && $val[$descriptor] > $count) {
			array_push($outArr, $key);
		}
		if(($descriptor == 'pomeranians' || $descriptor == 'goldfish') && $val[$descriptor] < $count) {
			array_push($outArr, $key);
		}
	}
}


$countArr = array();
// create $countArr
for($i = 1; $i <= 500; $i++) {
	$countArr[$i] = 0;
}

foreach($outArr as $out) {
	$countArr[$out]++;
}
arsort($countArr);

echo key($countArr);