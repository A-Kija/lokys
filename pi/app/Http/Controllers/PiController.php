<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PayseraService;

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
        $paysera->makePayment();
        return redirect()->route('thank-you');
    }

    public function thankYou()
    {
        return view('paysera.thank_you');
    }
}
