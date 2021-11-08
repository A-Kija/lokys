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

    public function startPayment(PayseraService $paysera) 
    {
        return redirect($paysera->redirectToPayment());
    }
}
