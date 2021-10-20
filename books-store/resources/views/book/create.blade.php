@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h1>Create book</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('book_store') }}" method="post">
                        <div class="row">
                            <div class="col-4 form-group">
                                title:<input type="text" class="form-control" name="book_title" value="{{''}}">
                            </div>
                            <div class="col-4 form-group">
                                ISBN: <input type="text" class="form-control" name="book_isbn" value="{{''}}">
                            </div>
                            <div class="col-4 form-group">
                                pages: <input type="text" class="form-control" name="book_pages" value="{{''}}">
                            </div>
                            <div class="col-6 form-group">
                                authors: <select name="author_id" class="form-control">
                                    <option value="0">Select author</option>
                                    @foreach ($authors as $author)
                                    <option value="{{$author->id}}">
                                        {{$author->name}} {{$author->surname}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 form-group">
                                about: <textarea name="book_about" class="form-control">{{''}}</textarea>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-success mt-2">New Book</button>
                            </div>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
