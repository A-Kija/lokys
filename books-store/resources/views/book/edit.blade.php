@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Edit book</div>
                <div class="card-body">
                    <form action="{{ route('book_update', $book) }}" method="post">
                        <div class="row justify-content-center">
                            <div class="col-4 form-group">
                                title:<input type="text" class="form-control" name="book_title" value="{{$book->title}}">
                            </div>
                            <div class="col-4 form-group">
                                ISBN: <input type="text" class="form-control" name="book_isbn" value="{{$book->isbn}}">
                            </div>
                            <div class="col-4 form-group">
                                pages: <input type="text" class="form-control" name="book_pages" value="{{$book->pages}}">
                            </div>
                            <div class="col-12 form-group">
                                about: <textarea name="book_about" class="form-control">{{$book->about}}</textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-success mt-2">Edit Book</button>
                            </div>
                        </div>
                        @method('PUT')
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
