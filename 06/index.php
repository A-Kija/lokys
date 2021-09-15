<?php

$X = 1000;

$A = function(int $arg) use (&$X) : int {
    return $arg * $X;
};


$B = fn(int $arg) => $arg * $X;

$X++;

echo $A(22);
echo '<br>';
echo $B(22);