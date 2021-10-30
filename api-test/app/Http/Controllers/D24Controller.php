<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;

class D24Controller extends Controller
{
    public function form()
    {
        return view('d24.form');
    }


    public function formSubmit(Request $request)
    {
        $data = Http::acceptJson()->
        get('https://www.distance24.org/route.json',
        ['stops' => $request->from.'|'.$request->to])
        ->json();

        $request->flash();

        return
        redirect()->
        back()->
        with('distance', $data['distance']);
    }


}
