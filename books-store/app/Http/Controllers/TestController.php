<?php

namespace App\Http\Controllers;

use App\Models\BookPhoto;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function showAuthorName($id)
    {
        $bookPhoto = BookPhoto::where('id', $id)->first();

        dd($bookPhoto);

        return $bookPhoto->getBook->getAuthor->name;
    }
}
