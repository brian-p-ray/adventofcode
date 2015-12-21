<?php
	$enemy = array(
		'hp' => 103,
		'dmg' => 9,
		'arm' => 2
	);
	$myHp = 100;
	$costArr = array();

	$weapons = array(
		'Dagger' => array(
			'cost' => 8,
			'dmg' => 4,
			'arm' => 0
		),
		'Shortsword' => array(
			'cost' => 10,
			'dmg' => 5,
			'arm' => 0
		),
		'Warhammer' => array(
			'cost' => 25,
			'dmg' => 6,
			'arm' => 0
		),
		'Longsword' => array(
			'cost' => 40,
			'dmg' => 7,
			'arm' => 0
		),
		'Greataxe' => array(
			'cost' => 74,
			'dmg' => 8,
			'arm' => 0
		)
	);
	$armor = array(
		// added to mimic not wearing armor.
		'None' => array(
			'cost' => 0,
			'dmg' => 0,
			'arm' => 0
		),
		'Leather' => array(
			'cost' => 13,
			'dmg' => 0,
			'arm' => 1
		),
		'Chainmail' => array(
			'cost' => 31,
			'dmg' => 0,
			'arm' => 2
		),
		'Splintmail' => array(
			'cost' => 53,
			'dmg' => 0,
			'arm' => 3
		),
		'Bandedmail' => array(
			'cost' => 75,
			'dmg' => 0,
			'arm' => 4
		),
		'Platemail' => array(
			'cost' => 102,
			'dmg' => 0,
			'arm' => 5
		)
	);
	$rings = array(
		// added to mimic not wearing ring 1.
		'None1' => array(
			'cost' => 0,
			'dmg' => 0,
			'arm' => 0
		),
		// added to mimic not wearing ring 2.
		'None2' => array(
			'cost' => 0,
			'dmg' => 0,
			'arm' => 0
		),
		'Damage1' => array(
			'cost' => 25,
			'dmg' => 1,
			'arm' => 0
		),
		'Damage2' => array(
			'cost' => 50,
			'dmg' => 2,
			'arm' => 0
		),
		'Damage3' => array(
			'cost' => 100,
			'dmg' => 3,
			'arm' => 0
		),
		'Defense1' => array(
			'cost' => 20,
			'dmg' => 0,
			'arm' => 1
		),
		'Defense2' => array(
			'cost' => 40,
			'dmg' => 0,
			'arm' => 2
		),
		'Defense3' => array(
			'cost' => 80,
			'dmg' => 0,
			'arm' => 3
		)
	);


	foreach($weapons as $weaponName => $weaponStats) {
		$cost = 0;
		$cost += $weaponStats['cost'];
		foreach($armor as $armorName => $armorStats) {
			$cost += $armorStats['cost'];
			foreach($rings as $ring1Name => $ring1Stats) {
				$cost += $ring1Stats['cost'];
				foreach($rings as $ring2Name => $ring2Stats) {
					$cost += $ring2Stats['cost'];
					if($ring2Name != $ring1Name) {
						$user = array(
							'hp' => $myHp,
							'dmg' => $weaponStats['dmg'],
							'arm' => $armorStats['arm']
						);
						if($ring1Stats['dmg'] > 0) {
							$user['dmg'] += $ring1Stats['dmg'];
						}
						else {
							$user['arm'] += $ring1Stats['arm'];
						}
						if($ring2Stats['dmg'] > 0) {
							$user['dmg'] += $ring2Stats['dmg'];
						}
						else {
							$user['arm'] += $ring2Stats['arm'];
						}
						if(battle($user, $enemy)) {
							$costArr[] = $cost;
						}
					}
					$cost -= $ring2Stats['cost']; // refund cost of ring2
				}
				$cost -= $ring1Stats['cost']; // refund cost of ring1
			}
			$cost -= $armorStats['cost']; // refund cost of armor
		}
		$cost -= $weaponStats['cost']; // refund cost of weapon
	}
	
	sort($costArr);
	echo '<pre>';
	print_r($costArr);
	echo '</pre>';

// part 1
	function battle($user, $enemy) {
		$userHp = $user['hp'];
		$enemyHp = $enemy['hp'];

		while(true) {
			$userDamage = $user['dmg'] - $enemy['arm'];
			$enemyHp -= ($userDamage > 0) ? $userDamage : 1;
			// echo 'enemy health: ' . $enemyHp . '<br>';
			if($enemyHp < 1) {
				return true;
			}

			$enemyDamage = $enemy['dmg'] - $user['arm'];
			$userHp -= ($enemyDamage > 0) ? $enemyDamage : 1;
			// echo 'player health: ' . $userHp . '<br><br>';
			if($userHp < 1) {
				return false;
			}
		}
	}
// part 2
	function battle($user, $enemy) {
		$userHp = $user['hp'];
		$enemyHp = $enemy['hp'];

		while(true) {
			$userDamage = $user['dmg'] - $enemy['arm'];
			$enemyHp -= ($userDamage > 0) ? $userDamage : 1;
			// echo 'enemy health: ' . $enemyHp . '<br>';
			if($enemyHp < 1) {
				return false;
			}

			$enemyDamage = $enemy['dmg'] - $user['arm'];
			$userHp -= ($enemyDamage > 0) ? $enemyDamage : 1;
			// echo 'player health: ' . $userHp . '<br><br>';
			if($userHp < 1) {
				return true;
			}
		}
	}