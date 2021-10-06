<?php

require __DIR__ . '/TV.php';


// $tv1 = new TV(42);
// $tv2 = new TV(64);

$tv1 = TV::create(42);
$tv2 = TV::create(64);

TV::$cableTv = [1 => 'TV3', 2 => 'Animal Planet', 3 => 'TNT'];

// $tv3 = new TV(100);
$tv3 = TV::create(100);


$tv2->sell('Kristina');
$tv2->changeChannel(2);

$tv3->sell('Petras');
$tv3->changeChannel(3);

$tv2->sell('Petras');

$tv2->sell('Janina');

$tv1->changeChannel(3);

$tv1->report(1);
$tv2->report(2);
$tv3->report(3);