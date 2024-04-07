<?php

# Given an array of integers, find the first missing positive integer in linear time and constant space. In other words,
# find the lowest positive integer that does not exist in the array. The array can contain duplicates and negative numbers
# as well. Implement using constant space.

$nums = [3, 4, -1, 1];

function firstMissingPositive($nums): int
{
    $n = count($nums);
    for ($i = 0; $i < $n; $i++) {
        while ($nums[$i] > 0 && $nums[$i] <= $n && $nums[$nums[$i] - 1] != $nums[$i]) {
            list($nums[$nums[$i] - 1], $nums[$i]) = [$nums[$i], $nums[$nums[$i] - 1]];
        }
    }
    for ($i = 0; $i < $n; $i++) {
        if ($nums[$i] != $i + 1) {
            return $i + 1;
        }
    }
    return $n + 1;
}

echo firstMissingPositive($nums); // 2