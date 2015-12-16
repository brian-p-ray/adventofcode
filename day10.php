<?php
	$input = '3113322113';
	$output = '';
	$rounds = 50;

	for($i = 0; $i < $rounds; $i++)
	{
		if($i == 0)
		{
			$output = process($input);
		} else
		{
			$output = process($output);
		}
	}
	echo strlen($output) . ' ' . $output . '<br>';

	function process($input)
	{
		$out = '';
		$arr = str_split($input);
		$length = count($arr);
		for($i = 0; $i < $length; $i++)
		{
			if($arr[$i] != $arr[$i+1]) {
				$out .= '1' . $arr[$i];
			}
			else if($arr[$i+1] != $arr[$i+2]) {
				$out .= '2' . $arr[$i];
				$i = $i + 1;
			}
			else if($arr[$i+2] != $arr[$i+3]) {
				$out .= '3' . $arr[$i];
				$i = $i + 2;
			}
			else if($arr[$i+3] != $arr[$i+4]) {
				$out .= '4' . $arr[$i];
				$i = $i + 3;
			}
			else if($arr[$i+4] != $arr[$i+5]) {
				$out .= '5' . $arr[$i];
				$i = $i + 4;
			}
		}
		return $out;
	}