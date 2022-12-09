<?php

$input = array_map('trim', file('input.txt'));
$total = 0;

foreach ($input as $rucksack) {
    $compartments = str_split($rucksack, strlen($rucksack)/2);
    for ($i=0; $i < strlen($compartments[0]); $i++) {
        $item = substr($compartments[0], $i, 1);
        if (str_contains($compartments[1], $item)) {
            $priority = ($item <= 'Z' ? ord($item) - 38 : ord($item) - 96);
            break;
        }
    }
    $total += $priority;
}
echo "Total: $total\n";
