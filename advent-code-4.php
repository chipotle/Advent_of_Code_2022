<?php

$input = array_map('trim', file('input.txt'));
$part1 = $part2 = 0;

foreach ($input as $pairs) {
    [$a1, $a2] = explode(',', $pairs);
    $r1 = explode('-', $a1);
    $r2 = explode('-', $a2);
    if (
        ((int)$r1[0] >= (int)$r2[0] && (int)$r1[1] <= (int)$r2[1]) ||
        ((int)$r2[0] >= (int)$r1[0] && (int)$r2[1] <= (int)$r1[1])
    ) {
        $part1++;
    }
    if (!empty(array_intersect(range($r1[0], $r1[1]), range($r2[0], $r2[1])))) {
        $part2++;
    }
}
echo "Totals:\n  Part 1: $part1\n  Part 2: $part2\n";
