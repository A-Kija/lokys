<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Author extends Model
{
    use HasFactory;

    public function getBooks()
    {
        return $this->hasMany(Book::class, 'author_id', 'id');
    }



    public function addPortret(Request $request)
    {
        if ($request->file('author_photo')) {
            $photo = $request->file('author_photo'); // informacija apie faila
            $photoName = rand(10000000, 99999999);
            $photExt = $photo->getClientOriginalExtension();// failo ispletimas
            $photoName = $photoName.'.'.$photExt;
            $destinationPath = public_path() . '/img/authors';// serverio kelias (be http)
            $photo->move($destinationPath, $photoName);
            $this->photo = asset('img/authors/'.$photoName); // irasoma i DB
        }
    }




}
