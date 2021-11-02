@extends('layouts.front')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Books</h1>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        @foreach ($books as $book)
                        <div class="col-md-4">
                            <div class="book">
                                <div class="book__title">
                                    {{$book->title}}
                                </div>
                                <div class="book__image">
                                    <img src="{{$book->img}}">
                                </div>
                                <div class="book__author">
                                    {{$book->author}}
                                </div>
                                <div class="book__price">
                                    <span>{{$book->price}} EUR</span>
                                    <button class="btn btn-success">Buy</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
