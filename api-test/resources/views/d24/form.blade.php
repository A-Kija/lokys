@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h1>Calculate distance</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('d24_form_submit') }}" method="post">
                        <div class="row justify-content-center">
                            <div class="col-6 form-group">
                                From:<input type="text" class="form-control" name="from" value="{{old('from')}}">
                            </div>
                            <div class="col-6 form-group">
                                To:<input type="text" class="form-control" name="to" value="{{old('to')}}">
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-success mt-2">Get Distance</button>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
