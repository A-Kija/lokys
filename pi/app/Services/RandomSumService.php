<?php

namespace App\Services;

class RandomSumService {


    public function randomSum($var)
    {
        return rand(1, 5) + $var;
    }

}