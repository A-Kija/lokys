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
        if ($request->clear) {
            Session::forget('history');
        }
        // History
        if ($action) {
            Session::push('history', [
                $var1,
                ['sum' => '+', 'diff' => '-', 'mult' => '*', 'div' => '/'][$action],
                $var2,
                '=',
                $result
            ]);
        }
        return view('miskas.calculator2', [
            'result' => $result,
            'var1' => $var1,
            'var2' => $var2,
            'action' => $action,
            'history' => array_reverse(Session::get('history', []))
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

    public function showColorForm()
    {
        return view('color.form', ['color' => Session::get('color', 'pink')]);
    }

    public function doColorForm(Request $request)
    {
        Session::put('color', $request->bg);
        return redirect()->route('show_color_form');
    }




    public function doCalcForm(Request $request)
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
        Session::put('r', $result);
        return redirect()->route('show_calc_form');
    }

    public function showCalcForm()
    {
        return view('color.calc', ['result' => Session::get('r', '')]);
    }



}
