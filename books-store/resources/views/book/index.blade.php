@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Books list</div>

                <div class="card-body">
                    <div class="container">
                        @foreach ($books->chunk(3) as $chunk)
                        <div class="row justify-content-center">
                            @foreach ($chunk as $book)
                            <div class="col-12">
                                <div class="index-list">
                                    <div class="index-list__extra">
                                        {{$book->title}}
                                    </div>
                                    <div class="index-list__content">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <b>Author:</b> {{$book->getAuthor->name}} {{$book->getAuthor->surname}}
                                            </li>
                                            <li class="list-group-item">
                                                {{$book->isbn}}
                                            </li>
                                            <li class="list-group-item">
                                                {{$book->pages}}
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="index-list__buttons">
                                        <a href="{{route('book_edit', $book)}}">REDAGUOTI</a>
                                        <a href="{{route('book_show', $book)}}">DAUGIAU</a>
                                        <form action="{{route('book_delete', $book)}}" method="post">
                                            <button type="submit">TRINTI</button>
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
