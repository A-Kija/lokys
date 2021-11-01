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
                            <div class="col-6 form-group">
                                From:<input type="text" class="form-control" name="from" value="{{old('from')}}">
                            </div>
                            <div class="col-6 form-group">
                                To:<input type="text" class="form-control" name="to" value="{{old('to')}}">
                            </div>
                        </div>
                        <div class="col-12">
                            @if(session()->has('distance'))
                                <h2>Distance is: {{session()->get('distance')}} km</h2>
                                <h4>From {{session()->get('source')}}</h4>
                            @endif
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-success mt-2">Get Distance</button>
                            <a href="{{route('fixer_form')}}" class="btn btn-success mt-2" >New Distance</a>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
