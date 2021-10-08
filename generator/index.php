<?php


function gen_one_to_three() {
    for ($i = 1; $i <= 13; $i++) {
        // Note that $i is preserved between yields.
        yield 'A' => rand(1, 1000);
    }
}


$generator = gen_one_to_three();

foreach ($generator as $i => $value) {
    echo $i . ' '. $value . '<br>';
}

// gen_one_to_three();