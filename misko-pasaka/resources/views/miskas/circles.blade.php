@extends('miskas.index')

@section('content')

<form action="{{route('circles')}}" method="get" class="gray">
    <input type="text" name="count" value="0">
    <button type="submit" name="color" value="gray">Do Gray Circles</button>
    <a href="{{route('circles')}}">Reset</a>
</form>

<form action="{{route('circles')}}" method="get" class="yellow">
    <input type="text" name="count" value="0">
    <button type="submit" name="color" value="yellow">Do Yellow Circles</button>
    <a href="{{route('circles')}}">Reset</a>
</form>

@foreach($circles as $color => $count)
    @for ($i = 0; $i < $count; $i++) <span class="circle {{$color}}"></span>@endfor
@endforeach

@endsection

@section('title')
    C-I-R-C-L-E-S
@endsection
