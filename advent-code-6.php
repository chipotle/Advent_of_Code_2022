<?php

$input = file_get_contents('input.txt');

function find_marker($input, $len) {
    for ($i = 0; $i < strlen($input); $i++) {
        $block = str_split(substr($input, $i, $len));
        if (count(array_unique($block)) == $len) {
            return $i + $len;
        }
    }
    return false;
}

$sop_marker = find_marker($input, 4);
$som_marker = find_marker($input, 14);

echo "Start-of-packet marker after character $sop_marker\n";
echo "Start-of-message marker after character $som_marker\n";
