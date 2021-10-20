@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h1>More about author</h1>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center show-content">
                        <div class="col-4 show-content__block">
                            <span>name:</span>
                            <div>{{$author->name}}</div>
                        </div>
                        <div class="col-4 show-content__block">
                            <span>surname:</span>
                            <div>{{$author->surname}}</div>
                        </div>
                        <div class="col-12 show-content__block">
                            <h4>Books by author</h4>
                            <ul class="list-group">
                                @foreach ($author->getBooks as $author)
                                <li class="list-group-item">{{$author->title}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection