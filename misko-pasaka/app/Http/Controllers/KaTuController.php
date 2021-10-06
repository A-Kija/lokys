<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KaTuController extends Controller
{
    public function kaNoriuTaIrRasau() 
    {
        return '<h1>as miegu</h1>';
    }

    public function labas(Request $request, $vardas)
    {
        // $request->color ====> blond
        return "<h1>Hello, $vardas,</h1>";
    }

    public function calc(Request $r, int $sk1) // $r ==> $request
    {
        $sk2 = $r->sk2;

        return $sk1 + $sk2;
    }

    public function mk($title = '')
    {
        return view('miskas.pasaka', [
            'bladeTitle' => $title
        ]);
    }

    public function plusCounter(Request $request, $color)
    {
        $pluses = str_repeat('+', $request->count);

        // return view('miskas.plus', [
        //     'pluses' => $pluses,
        //     'color' => $color
        // ]);
        return view('miskas.plus', compact('pluses', 'color'));
    }

    public function squares(...$colors)
    {
        // dd($request->all());
        return view('miskas.squares', compact('colors'));
        // return view('miskas.squares', ['colors' => $request->all()]);
    }
}
