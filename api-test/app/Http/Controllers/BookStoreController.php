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

        dd($data);
    }
}
