<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;

class BookController extends Controller
{
    public function showList()
    {
        $data = Http::acceptJson()->
        get('https://in3.dev/knygos/')->
        json();
        return view('book.list', ['books' => $data]);
    }
}
