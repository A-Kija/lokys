<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class ShController extends Controller
{
    public function showShapeForm() 
    {
        return view('shape.index', [
            'shape' => Session::get('shape', ''),
            'count' => Session::get('count', 0),
            'shapeData' => ['blue_square', 'red_square', 'yellow_circle', 'pink_circle']
        ]);
    }

    public function doShapeForm(Request $request) 
    {
        $request->flash();

        if (!$request->shape || !$request->count) {
            return redirect()
            ->route('show_shape_form')
            ->with('msg_error', 'All bad');
        }

        return redirect()
        ->route('show_shape_form')
        ->with('msg_good', 'All good')
        ->with('count', $request->count)
        ->with('shape', $request->shape);
    }

}
