<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;
use App\Models\Distance;

class D24Controller extends Controller
{
    public function form()
    {
        return view('d24.form');
    }


    public function formSubmit(Request $request)
    {
        $from = strtolower($request->from);
        $to = strtolower($request->to);
        
        $distance = Distance::where('town1', $from)
        ->where('town2', $to)
        ->orWhere(function($query) use ($to, $from) {
            $query->where('town1', $to)
                  ->where('town2', $from);
        })
        ->first();

        

        if ($distance) {
            $returnDistance = $distance->distance;
            $source = 'CACHE';
        }
        else {
            $data = Http::acceptJson()->
            get('https://www.distance24.org/route.json',
            ['stops' => $from.'|'.$to])
            ->json();
            $returnDistance = $data['distance'];
            $source = 'API';
            $distance = new Distance;
            $distance->distance = $data['distance'];
            $distance->town1 = $from;
            $distance->town2 = $to;
            $distance->save();
        }

        $request->flash();
        return
        redirect()->
        back()->
        with('distance', $returnDistance)->
        with('source', $source);
    }


}
