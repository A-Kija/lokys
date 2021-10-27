<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function getAuthor()
    {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }


    public function getPhotos()
    {
        return $this->hasMany(BookPhoto::class, 'book_id', 'id');
    }

}
