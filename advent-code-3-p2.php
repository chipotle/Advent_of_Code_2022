<?php

$input = array_map('trim', file('input.txt'));
$total = 0;
$groups = array_chunk($input, 3);

foreach ($groups as $rucksacks) {
    for ($i=0; $i < strlen($rucksacks[0]); $i++) {
        $item = substr($rucksacks[0], $i, 1);
        if (str_contains($rucksacks[1], $item) && str_contains($rucksacks[2], $item)) {
            $priority = ($item <= 'Z' ? ord($item) - 38 : ord($item) - 96);
            break;
        }
    }
    $total += $priority;
}
echo "Total: $total\n";
