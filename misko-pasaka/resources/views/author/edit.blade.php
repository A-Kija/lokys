@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h1>Edit author</h1></div>
                <div class="card-body">
                    <form action="{{ route('author_update', $author) }}" method="post">
                        <div class="row justify-content-center">
                            <div class="col-6 form-group">
                                name:<input type="text" class="form-control" name="author_name" value="{{old('author_name', $author->name)}}">
                            </div>
                            <div class="col-6 form-group">
                                surname: <input type="text" class="form-control" name="author_surname" value="{{old('author_surname', $author->surname)}}">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-success mt-2">Edit Author</button>
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