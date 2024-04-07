<?php

# Given a string s and a string p, implement wildcard pattern matching with support for '?' and '*'.
# '?' Matches any single character.
# '*' Matches any sequence of characters (including the empty sequence).

# The matching should cover the entire input string (not partial).

# Example 1:
# Input: s = "aa", p = "a"
# Output: false
# Explanation: "a" does not match the entire string "aa".

# Example 2:
# Input: s = "aa", p = "*"
# Output: true
# Explanation: '*' matches any sequence.

# Example 3:
# Input: s = "cb", p = "?a"
# Output: false
# Explanation: '?' matches 'c', but the second letter is 'a', which does not match 'b'.

function isMatch($s, $p): bool
{
    $m = strlen($s);
    $n = strlen($p);
    $dp = array_fill(0, $m + 1, array_fill(0, $n + 1, false));
    $dp[0][0] = true;
    for ($j = 1; $j <= $n; $j++) {
        if ($p[$j - 1] == '*') {
            $dp[0][$j] = $dp[0][$j - 1];
        }
    }
    for ($i = 1; $i <= $m; $i++) {
        for ($j = 1; $j <= $n; $j++) {
            if ($p[$j - 1] == '*') {
                $dp[$i][$j] = $dp[$i - 1][$j] || $dp[$i][$j - 1];
            } elseif ($p[$j - 1] == '?' || $s[$i - 1] == $p[$j - 1]) {
                $dp[$i][$j] = $dp[$i - 1][$j - 1];
            }
        }
    }
    return $dp[$m][$n];
}

$s = "aa";
$p = "a";
var_dump(isMatch($s, $p)); # false

$s = "aa";
$p = "*";
var_dump(isMatch($s, $p)); # true

$s = "cb";
$p = "?a";
var_dump(isMatch($s, $p)); # false