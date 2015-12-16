<?php
$ingredients = array(
	'Sprinkles' => array(
		'capacity' => 5,
		'durability' => -1,
		'flavor' => 0,
		'texture' => 0,
		'calories' => 5
	),
	'PeanutButter' => array(
		'capacity' => -1,
		'durability' => 3,
		'flavor' => 0,
		'texture' => 0,
		'calories' => 1
	),
	'Frosting' => array(
		'capacity' => 0,
		'durability' => -1,
		'flavor' => 4,
		'texture' => 0,
		'calories' => 6
	),
	'Sugar' => array(
		'capacity' => -1,
		'durability' => 0,
		'flavor' => 0,
		'texture' => 2,
		'calories' => 8
	)
);

$totalArr = array();
$ingredientArray = array();
extract($ingredients);

$ingPercentage = 100;


for($i = 1; $i <= $ingPercentage; $i++) {
	for($j = 1; $j <= $ingPercentage-$i; $j++) {
		for($k = 1; $k <= $ingPercentage-$i-$j; $k++) {
			$l = $ingPercentage - $i - $j - $k;

			$totalCapacity = ($Sprinkles['capacity'] * $i) + ($PeanutButter['capacity'] * $j) + ($Frosting['capacity'] * $k) + ($Sugar['capacity'] * $l);
			$totalDurability = ($Sprinkles['durability'] * $i) + ($PeanutButter['durability'] * $j) + ($Frosting['durability'] * $k) + ($Sugar['durability'] * $l);
			$totalFlavor = ($Sprinkles['flavor'] * $i) + ($PeanutButter['flavor'] * $j) + ($Frosting['flavor'] * $k) + ($Sugar['flavor'] * $l);
			$totalTexture = ($Sprinkles['texture'] * $i) + ($PeanutButter['texture'] * $j) + ($Frosting['texture'] * $k) + ($Sugar['texture'] * $l);
			$totalCalories = ($Sprinkles['calories'] * $i) + ($PeanutButter['calories'] * $j) + ($Frosting['calories'] * $k) + ($Sugar['calories'] * $l);

			$totalCapacity = $totalCapacity < 0 ? 0 : $totalCapacity;
			$totalDurability = $totalDurability < 0 ? 0 : $totalDurability;
			$totalFlavor = $totalFlavor < 0 ? 0 : $totalFlavor;
			$totalTexture = $totalTexture < 0 ? 0 : $totalTexture;
			$totalCalories = $totalCalories < 0 ? 0 : $totalCalories;

			$ingredientArray[] = array(
				'capacity' => $totalCapacity,
				'durability' => $totalDurability,
				'flavor' => $totalFlavor,
				'texture' => $totalTexture,
				'calories' => $totalCalories
			);
			// part 1
			$totalArr[$i.'-'.$j.'-'.$k.'-'.$l] = $totalCapacity * $totalDurability * $totalFlavor * $totalTexture;
			// part 2
			if($totalCalories == 500) {
				$totalArr[$i.'-'.$j.'-'.$k.'-'.$l] = $totalCapacity * $totalDurability * $totalFlavor * $totalTexture;
			}
		}
	}
}
arsort($totalArr);
print_r($totalArr);