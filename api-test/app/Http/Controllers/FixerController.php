<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;

class FixerController extends Controller
{
    public function form()
    {
        // return env('MANO_GRYBAS');
        
        
        return view('fixer.form');
    }

    public function formSubmit(Request $request)
    {

        $data = Http::acceptJson()->
        get('http://data.fixer.io/api/latest',
        ['access_key' => env('FIXER_API')])
        ->json();

        dd($data);

    }





}
