<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoTenController extends Controller
{
    public function multi10(Request $request)
    {
        $digit = $request->digit ?? '0';

        return view('do10', ['digit' => $digit]);
    }
}
