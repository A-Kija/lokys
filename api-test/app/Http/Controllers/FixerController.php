<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;
use App\Models\Currency;

class FixerController extends Controller
{
    public function form()
    {
        $data = Currency::orderBy('currency')
        ->get()
        ->pluck('currency')
        ->all();
        return view('fixer.form', ['data' => $data]);
    }

    public function formSubmit(Request $request)
    {

        // $data = Http::acceptJson()->
        // get('http://data.fixer.io/api/latest',
        // ['access_key' => env('FIXER_API')])
        // ->json();

        // // Currency table update
        // $time = (int) time();
        // foreach ($data['rates'] as $currency => $rate) {
        //     Currency::updateOrCreate(
        //         ['currency' => $currency],
        //         ['rate' => (float) $rate, 'time' => $time]
        //     );
        // }

        $currency = Currency::where('currency', $request->currency)->first();

        // Check if need to update

        if ($request->eur_value) {
            $eur = (float) $request->eur_value;
            $value = $currency->rate * $eur;
        }
        else {
            $value = (float) $request->value;
            $eur =  $value / $currency->rate;
        }

        return redirect()
        ->back()
        ->with('eur_value', $eur)
        ->with('value', $value)
        ->with('currency', $currency->currency);

    }





}
