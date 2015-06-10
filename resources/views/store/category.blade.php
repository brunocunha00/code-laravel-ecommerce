@extends('store.store')

@section('left-bar')
    <div class="col-sm-3">
        @include('partials._categories')
    </div>
@stop

@section('content')
    <div class="col-sm-9 padding-right">
        @include('partials._product', ['products' => $products])
    </div>

@stop