@extends('layouts.front')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Books</h1>
                    <div class="front-sort">
                        <form action="{{route('books')}}" method="GET">
                            <div class="form-group">
                                <label class="m-2">Sort by:</label>
                                <select class="form-control m-2" name="sort">
                                    <option value="title">Title</option>
                                    <option value="price_asc" @if('price_asc'==$select)selected @endif>Price from the lowest</option>
                                    <option value="price_desc" @if('price_desc'==$select)selected @endif>Price from the highest</option>
                                </select>
                                <button type="submit" class="btn btn-secondary m-2">Sort</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        @foreach ($books as $book)
                        <div class="col-md-4">
                            <div class="book">
                                <div class="book__title">
                                    {{$book->title}}
                                </div>
                                <div class="book__cat">
                                    {{$book->cat}}
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
