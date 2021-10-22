@extends('shape.app')

@section('content')
<form action="{{route('do_shape_form')}}" method="post" style="padding: 20px;">
    <input type="text" name="count" value="{{old('count')}}">
    <select name="shape">
        <option value=''>Select Shape</option>
        <option value="blue_s" @if(old('shape') == 'blue_s') selected @endif>Blue Square</option>
        <option value="red_s" @if(old('shape') == 'red_s') selected @endif>Red Square</option>
        <option value="yellow_c" @if(old('shape') == 'yellow_c') selected @endif>Yellow Circle</option>
        <option value="pink_c" @if(old('shape') == 'pink_c') selected @endif>Pink Circle</option>
    </select>
    <button type="submit">Show</button>
    @csrf
</form>

@foreach ($shapeData as $sh)
    @include('shape.shapes.'.$sh)
@endforeach

@endsection