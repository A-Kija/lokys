<?php

namespace App\Services;

use App\Paysera\WebToPay;
use Exception;

class PayseraService {

    private $projectid, $sign_password; 

    public function __construct()
    {
        require_once(app_path().'/Paysera/WebToPay.php');
        $this->projectid = env('PROJECT_ID');
        $this->sign_password = env('SIGN_PASSWORD');
    }
    



    public function redirectToPayment($request)
    {
        try {
            return WebToPay::redirectToPayment([
               'projectid' => $this->projectid,
               'sign_password' => $this->sign_password,
               'orderid' => rand(1000000, 9999999),
               'amount' => ((float) $request->total) * 100,
               'currency' => 'EUR',
               'country' => 'LT',
               'accepturl' => route('paysera_accept'),
               'cancelurl' => route('paysera_cancel'),
               'callbackurl' => route('paysera_callback'),
               'test' => 1,

               'p_firstname' => $request->buyer_name,
               'p_lastname' => $request->buyer_last_name,
               'p_email' => $request->buyer_email,
           ]);
       } catch (Exception $exception) {
        echo get_class($exception) . ':' . $exception->getMessage();
       }
          
    }

    public function makePayment()
    {
        try {
            $response = WebToPay::validateAndParseData(
                $_REQUEST,
                $this->projectid,
                $this->sign_password
            );
        
            if ($response['status'] === '1' || $response['status'] === '3') {
                // apsidoroti pirkimą
                return $response;
            } 
            else {
                throw new Exception('Payment was not successful');
            }
        } 
        catch (Exception $exception) {
            echo get_class($exception) . ':' . $exception->getMessage();
        }
    }

}