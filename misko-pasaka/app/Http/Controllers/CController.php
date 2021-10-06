<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CController extends Controller
{
    public function calculator($action, $var1, $var2)
    {
        $result = match($action) {
            'sum' => $var1 + $var2,
            'diff' => $var1 - $var2,
            'mult' => $var1 * $var2,
            'div' => $var2 == 0 ? 'division by zero' : $var1 / $var2,
            default => 'no such action'
        };
        return view('miskas.calculator', ['result' => $result]);
    }

    public function colorForm(Request $request)
    {
        $color = $request->bg ?? 'pink';

        return view('miskas.color_form', ['color' => $color]);
    }
}
