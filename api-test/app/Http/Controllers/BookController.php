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
        // Objektu kolekcija
        $data = array_map(fn($b) => (object) $b, $data);
        $books = collect($data);

        return view('book.list', ['books' => $books]);
    }
}
