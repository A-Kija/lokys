<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PayseraService;
use App\Models\Order;

class PiController extends Controller
{
    public function go()
    {
        return view('go');
    }

    public function startPayment(PayseraService $paysera, Request $request) 
    {
        return redirect($paysera->redirectToPayment($request));
    }

    public function cancel()
    {
        return view('paysera.cancel');
    }

    public function accept(PayseraService $paysera)
    {
        $payment = $paysera->makePayment();

        $order = new Order;

        $order->order = $payment['orderid'];
        $order->client_name = $payment['p_firstname'];
        $order->client_last_name = $payment['p_lastname'];
        $order->client_email = $payment['p_email'];
        $order->amount = ((int)$payment['payamount'])/100;

        $order->save();

        return redirect()->route('paysera_thank_you');
    }

    public function thankYou()
    {
        return view('paysera.thank_you');
    }







}
