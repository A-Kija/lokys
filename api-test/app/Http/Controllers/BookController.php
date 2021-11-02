<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;

class BookController extends Controller
{
    public function showList(Request $request)
    {
        $data = Http::acceptJson()->
        get('https://in3.dev/knygos/')->
        json();
        // Objektu kolekcija
        $data = array_map(fn($b) => (object) $b, $data);
        $books = collect($data)->sortBy('title');
        

        if ($request->sort && $request->sort == 'price_asc') {
            $books = $books->sortBy('price');
            $select = 'price_asc';
        }
        elseif ($request->sort && $request->sort == 'price_desc') {
            $books = $books->sortByDesc('price');
            $select = 'price_desc';
        }

        return view('book.list', [
            'books' => $books,
            'select' => $select ?? 'default'
        ]);
    }
}
