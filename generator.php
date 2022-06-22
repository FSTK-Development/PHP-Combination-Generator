<?php

	// GENERATOR
	function generate($alphabet, $length) {
		$alph = mb_str_split($alphabet);
		$maxChar = count($alph);
		$idxs = array_fill(0, $length, 0);
		while (true) {
			yield implode('', array_map(fn($idx) => $alph[$idx], $idxs));
			$pos = $length - 1;
			while (true) {
				$idxs[$pos] += 1;
				if ($idxs[$pos] < $maxChar) {
					break;
				}
				$idxs[$pos] = 0;
				$pos -= 1;
				if ($pos < 0) {
					return;
				}
			}
		}
	}

	// EXAMPLE
	$chars = '0123456789';
	$count = 4;
	foreach (generate($chars, $count) as $combination) {
		echo $combination.PHP_EOL;
	}
?>