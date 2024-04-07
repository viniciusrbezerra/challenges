<?php

# Given a string, find the first non-repeating character in it and return its index. If it doesn't exist, return -1.

# Using hash map
function firstUniqChar($s): int
{
    $n = strlen($s);
    $chars = [];
    for ($i = 0; $i < $n; $i++) {
        $chars[$s[$i]] = ($chars[$s[$i]] ?? 0) + 1;
    }
    for ($i = 0; $i < $n; $i++) {
        if ($chars[$s[$i]] == 1) {
            return $i;
        }
    }
    return -1;
}

# Using array
function firstUniqChar2($s): int
{
    $n = strlen($s);
    $a = array_fill(0, 26, 0);
    for ($i = 0; $i < $n; $i++) {
        $a[ord($s[$i]) - ord('a')]++;
    }
    for ($i = 0; $i < $n; $i++) {
        if ($a[ord($s[$i]) - ord('a')] == 1) {
            return $i;
        }
    }
    return -1;
}

echo firstUniqChar("abcdabc"); // 3
echo PHP_EOL;
echo firstUniqChar2("abcabc"); // -1