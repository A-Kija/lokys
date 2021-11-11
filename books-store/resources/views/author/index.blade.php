@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="card-header__wrap">
                        <h1>Authors list</h1>
                        <div class="card-header__wrap__sort">
                            <form action="{{route('author_index')}}" method="GET">
                                <div class="form-group">
                                    <select name="sort" class="form-control">
                                        <option value="">Sort By</option>
                                        <option value="name_asc" @if('name_asc'==$sort) selected @endif>Name A->Z</option>
                                        <option value="name_desc" @if('name_desc'==$sort) selected @endif>Name Z->A</option>
                                        <option value="new_asc" @if('new_asc'==$sort) selected @endif>New A->Z</option>
                                        <option value="new_desc" @if('new_desc'==$sort) selected @endif>New Z->A</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-info m-1">SORT</button>
                                <a href="{{route('author_index')}}" class="btn btn-warning m-1">RESET</a>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body" id="authors--list" data-url="{{route('author_list')}}">
                    LISTAS
                </div>
            </div>
        </div>
    </div>
</div>
<div id="confirm-modal" style="display:none;">
    <div class="card">
        <h5 class="card-header">Confirmation</h5>
        <div class="card-body">
            <h5 class="card-title">Confirm author delete</h5>
            <div class="buttons">
                <form action="" class="m-1" method="post">
                    <button type="submit" class="btn btn-danger">DELETE</button>
                    @method('DELETE')
                    @csrf
                </form>
                <button type="button" class="cancel--confirm--button btn btn-info m-1">Cancel</button>
            </div>
        </div>
    </div>
</div>
@endsection