<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;
use Validator;
use PDF;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $authors = Author::orderBy('name')->get(); // select

        if ($request->author) {
            $books = Book::where('author_id', $request->author)->get();
        }
        else {
            $books = Book::all();
        }
        

        // dd($books->contains(function ($book, $key) {
        //     return $book->title == 'Troba pilna Diedu333';
        // }));

        // $books = $books->nth(2);

        // $plucked = $books->pluck('title')->all();

        // dd($plucked);

        return view('book.index', [
            'books' => $books,
            'authors' => $authors,
            'author_id' => $request->author ?? 0
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        return view('book.create', ['authors' => $authors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make(
            $request->all(),
            [
            'book_title' => 'required|max:255|min:2',
            'book_isbn' => 'required|max:20|min:5',
            'book_pages' => 'required|integer|max:200|min:1',
            'book_about' => 'required|min:10',
            'author_id' => 'required|integer|min:1',
            ],
            [
                'author_id.min' => 'Please, select author.'
            ]
        );

        $request->flash();

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator);
        }
        
        $book = new Book;
        $book->title = $request->book_title;
        $book->isbn = $request->book_isbn;
        $book->pages = $request->book_pages;
        $book->about = $request->book_about;
        $book->author_id = $request->author_id;
        $book->save();
        return redirect()
        ->route('book_index')
        ->with('success_message', 'OK. New book was created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('book.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = Author::all();

        return view('book.edit', ['book' => $book, 'authors' => $authors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        
        $validator = Validator::make(
            $request->all(),
            [
            'book_title' => 'required|max:255|min:2',
            'book_isbn' => 'required|max:20|min:5',
            'book_pages' => 'required|integer|max:200|min:1',
            'book_about' => 'required|min:10',
            'author_id' => 'required|integer|min:1',
            ],
            [
                'author_id.min' => 'Please, select author.'
            ]
        );

        $request->flash();

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator);
        }
        
        $book->title = $request->book_title;
        $book->isbn = $request->book_isbn;
        $book->pages = $request->book_pages;
        $book->about = $request->book_about;
        $book->author_id = $request->author_id;

        $book->save();

        return redirect()
        ->route('book_index')
        ->with('success_message', 'OK. The book was edited.');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Book $book)
    {
        $book->delete();
        if ($request->return && $request->return == 'back') {
            return redirect()
            ->back()
            ->with('success_message', 'OK. New book was deleted.');
        }
        return redirect()
        ->route('book_index')
        ->with('success_message', 'OK. New book was deleted.');
    }

    public function pdf(Book $book)
    {

        $pdf = PDF::loadView('book.pdf', ['book' => $book]);
        return $pdf->download('book-'.$book->id.'.pdf');

    }
}
