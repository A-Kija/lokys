<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;

class BookStoreController extends Controller
{
    public function showList()
    {
        $data = Http::acceptJson()->
        get('http://localhost/books-store/public/api/books')->
        json();

        $data = array_map(fn($b) => (object) $b, $data['data']);
        $books = collect($data)->sortBy('title');


        return view('book_store.list', ['books' => $books]);

    }

    public function showBook($id)
    {
        $data = Http::acceptJson()->
        get('http://localhost/books-store/public/api/book/'.$id)->
        json();

        dd($data);
    }

}
