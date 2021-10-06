<?php


function suma($first, ...$number)
{
    return array_sum($number) - $first;
}




function letters($l1, $l2, $l3, $l4, $l5)
{
    echo $l1.$l2.$l3.$l4.$l5;
}


echo suma(4, 8, 9, 45, 22, 12);
echo '<br>';

$l = ['L', 'a', 'b', 'a', 's'];

letters(...$l);