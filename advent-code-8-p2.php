<?php

$input = array_map(fn ($x) => str_split(trim($x), 1), file('input.txt'));

function up($row, $col, $input)
{
    if ($row == 0) return 0;
    $count = 1;
    $saved_val = $input[$row][$col];
    while (true) {
        $row--;
        if ($row <= 0) return $count;
        if ($input[$row][$col] < $saved_val) {
            $count++;
        } else {
            return $count;
        }
    }
}

function down($row, $col, $input)
{
    if ($row == count($input)-1) return 0;
    $count = 1;
    $saved_val = $input[$row][$col];
    while (true) {
        $row++;
        if ($row >= count($input)-1) return $count;
        if ($input[$row][$col] < $saved_val) {
            $count++;
        } else {
            return $count;
        }
    }
}

function left($row, $col, $input)
{
    if ($col == 0) return 0;
    $count = 1;
    $saved_val = $input[$row][$col];
    while (true) {
        $col--;
        if ($col <= 0) return $count;
        if ($input[$row][$col] < $saved_val) {
            $count++;
        } else {
            return $count;
        }
    }
}

function right($row, $col, $input)
{
    if ($col == count($input[$row])-1) return 0;
    $count = 1;
    $saved_val = $input[$row][$col];
    while (true) {
        $col++;
        if ($col >= count($input[$row])-1) return $count;
        if ($input[$row][$col] < $saved_val) {
            $count++;
        } else {
            return $count;
        }
    }
}

$high = 0;
for ($row = 0; $row < count($input); $row++) {
    for ($col = 0; $col < count($input[$row]); $col++) {
        $scenic = up($row, $col, $input) * down($row, $col, $input) *
            left($row, $col, $input) * right($row, $col, $input);
        if ($scenic > $high) $high = $scenic;
    }
}
echo "Highest scenic score: $high\n";
