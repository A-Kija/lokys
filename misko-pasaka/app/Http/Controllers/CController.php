<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        
        
        // $color = $request->bg ?? 'pink';

        // get => paimti
        // put => ideti
        // push => prideti prie masyvo
        // pull => paimti ir istrinti
        // forget => istrinti

        if ($request->bg) {
            Session::put('color', $request->bg);
        }

        $color = Session::get('color', 'pink');

        return view('miskas.color_form', ['color' => $color]);
    }


    public function calculator2(Request $request)
    {
        $var1 = $request->var1;
        $var2 = $request->var2;
        $action = $request->action;
        if ($var1 === null || $var2 === null || $action === null) {
            $result = '';
        }
        else {
            $result = match($action) {
                'sum' => $var1 + $var2,
                'diff' => $var1 - $var2,
                'mult' => $var1 * $var2,
                'div' => $var2 == 0 ? 'division by zero' : $var1 / $var2,
                default => 'no such action'
            };
        }
        return view('miskas.calculator2', [
            'result' => $result,
            'var1' => $var1,
            'var2' => $var2,
            'action' => $action
        ]);
    }

    public function circles(Request $request)
    {
       
        if ('gray' == $request->color) {
            Session::put('gray', $request->count);
        }
        else if ('yellow' == $request->color) {
            Session::put('yellow', $request->count);
        }
        else {
            Session::forget('yellow');
            Session::forget('gray');
        }



        return view('miskas.circles', [
            'circles' => [
                'gray' => Session::get('gray', 0),
                'yellow' => Session::get('yellow', 0)
                ]
        ]);
    }



}
