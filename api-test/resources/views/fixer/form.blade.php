@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h1>Currency Calculator</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('fixer_form_submit') }}" method="post">
                        <div class="row justify-content-center">
                            <div class="col-5 form-group">
                                EUR value:<input type="text" class="form-control" name="eur_value" value="{{session()->get('eur_value', '')}}">
                            </div>
                            <div class="col-2 form-group">
                                Currency:<select name="currency" class="form-control">
                                @foreach ($data as $name)
                                    <option value="{{$name}}"
                                    @if(session()->get('currency', '') == $name) selected @endif
                                    >{{$name}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="col-5 form-group">
                                Value:<input type="text" class="form-control" name="value" value="{{session()->get('value', '')}}">
                            </div>
                        </div>
                        <div class="col-12">
                            <h2 style="color:red;">{{session()->get('updated')}}</h2>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-success mt-2">Calculate</button>
                            <a href="{{route('fixer_form')}}" class="btn btn-success mt-2">New Calculation</a>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
