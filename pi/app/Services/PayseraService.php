<?php

namespace App\Services;

use App\Paysera\WebToPay;
use Exception;

class PayseraService {


    public function __construct()
    {
        require_once(app_path().'/Paysera/WebToPay.php');

    }
    



    public function redirectToPayment()
    {
        try {
            return WebToPay::redirectToPayment([
               'projectid' => '{YOUR_PROJECT_ID}',
               'sign_password' => '{YOUR_PROJECT_PASSWORD}',
               'orderid' => rand(1000000, 9999999),
               'amount' => rand(100, 99999),
               'currency' => 'EUR',
               'country' => 'LT',
               'accepturl' => route('paysera_accept'),
               'cancelurl' => route('paysera_cancel'),
               'callbackurl' => route('paysera_callback'),
               'test' => 1,
           ]);
       } catch (Exception $exception) {
        echo get_class($exception) . ':' . $exception->getMessage();
       }
          
    }

}