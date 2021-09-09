<?php

$masyvas = [];

foreach (range(0, 100) as $val) {

    // if ($val % 10 == 0) {
    //     $masyvas[$val] = 'A';
    // }
    // else {
    //     $masyvas[$val] = 'B';
    // }

    $masyvas[] = $val % 10 ? 'A' : 'B';


}
echo '<pre>';
print_r($masyvas);


foreach ($masyvas as $key => $val) {

    $mazasMasyvas = [];

    $random = rand(3, 10);
    foreach (range(1, $random) as $_) {
        $mazasMasyvas[] = $val;
    }

    $masyvas[$key] = $mazasMasyvas;


}

foreach ($masyvas as &$val) {

    while (count($val) < 10) {
        $val[] = 'C';
    }

}
unset($val);

$counter = ['A' => 0, 'B' => 0, 'C' => 0];

foreach ($masyvas as $mazas) {

    foreach ($mazas as $val) {

        $counter[$val]++;

    }

}









echo '<pre>';
// print_r($masyvas);

print_r($counter);

// var_dump($masyvas);

// _d($masyvas);


// $a = 5;
// $b = $a;
// $a = 8;

// _d([$a, $b]);