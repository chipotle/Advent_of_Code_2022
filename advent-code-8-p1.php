<?php

$input = array_map(fn ($x) => str_split(trim($x), 1), file('input.txt'));

function visible_col($row, $col, $input)
{
    $tree_val = $input[$row][$col];
    $visible = true;
    for ($i = $col - 1; $i >= 0; $i--) {
        $visible = $visible && ($tree_val > $input[$row][$i]);
    }
    if ($visible) return true;
    $visible = true;
    for ($i = $col + 1; $i < count($input[$row]); $i++) {
        $visible = $visible && ($tree_val > $input[$row][$i]);
    }
    return $visible;
}

function visible_row($row, $col, $input)
{
    $tree_val = $input[$row][$col];
    $visible = true;
    for ($i = $row - 1; $i >= 0; $i--) {
        $visible = $visible && ($tree_val > $input[$i][$col]);
    }
    if ($visible) return true;
    $visible = true;
    for ($i = $row + 1; $i < count($input); $i++) {
        $visible = $visible && ($tree_val > $input[$i][$col]);
    }
    return $visible;
}

$visible_trees = 0;

for ($row = 0; $row < count($input); $row++) {
    for ($col = 0; $col < count($input[$row]); $col++) {
        if (visible_col($row, $col, $input) || visible_row($row, $col, $input)) {
            $visible_trees++;
        }
    }
}
echo "Visible trees: $visible_trees\n";
