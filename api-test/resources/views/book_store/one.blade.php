@extends('layouts.front')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>{{$book->title}}</h1>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="book">
                                <div class="book__author">
                                    {{$book->author}}
                                </div>
                                <div class="book__images">
                                    @forelse ($book->photos as $photo)
                                    <div class="book__images__img">
                                        <img src="{{$photo->photo}}">
                                    </div>
                                    @empty
                                    <div class="book__images__img">
                                        <img src="{{asset('img/no-image.png')}}">
                                    </div>
                                    @endforelse
                                </div>
                                <div class="book__about">
                                    {{$book->about}}
                                </div>
                                <div class="book__tags">
                                    @forelse ($book->tags as $tag)
                                    <div class="book__tags__tag">
                                        <span class="badge rounded-pill badge-info">#{{$tag->name}}</span>
                                    </div>
                                    @empty
                                    <h3>No tags</h3>
                                    @endforelse
                                </div>
                                <div class="book__info">
                                    <div><b>Pages:</b> {{$book->pages}}</div>
                                    <div><b>ISBN:</b> {{$book->isbn}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
