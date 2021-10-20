@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h1>Authors list</h1></div>
                <div class="card-body">
                    <div class="container">
                        @foreach ($authors->chunk(3) as $chunk)
                        <div class="row justify-content-center">
                            @foreach ($chunk as $author)
                            <div class="col-12">
                                <div class="index-list">
                                    <div class="index-list__extra">
                                        {{$author->name}} {{$author->surname}}
                                    </div>
                                    <div class="index-list__content">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <b>Books count:</b> {{$author->getBooks->count()}}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="index-list__buttons">
                                        <a href="{{route('author_edit', $author)}}" class="btn btn-success m-2">EDIT</a>
                                        <form action="{{route('author_delete', $author)}}" class="m-2" method="post">
                                            <button type="submit" class="btn btn-danger">DELETE</button>
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                        <a href="{{route('author_show', $author)}}" class="btn btn-info m-2">MORE</a>
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