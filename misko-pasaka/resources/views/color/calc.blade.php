@extends('miskas.index')

@section('content')
<form action="{{route('do_calc_form')}}" method="post" style="padding: 20px;">
    <input type="text" name="var1" value="{{old('var1')}}">
    <select name="action">
        <option value="sum" @if(old('action') == 'sum') selected @endif>+</option>
        <option value="diff" @if(old('action') == 'diff') selected @endif>-</option>
        <option value="mult" @if(old('action') == 'mult') selected @endif>*</option>
        <option value="div" @if(old('action') == 'div') selected @endif>/</option>
    </select>
    <input type="text" name="var2" value="{{old('var2')}}">
    <button type="submit">Calculate</button>
    {{-- <a href="{{route('c2')}}">Reset</a> --}}
    @csrf
</form>

@if($result)
<h2 style="color:pink; padding: 5px; border:1px solid pink; display:inline-block;">
    {{$result}}
</h2>
@endif
@endsection



