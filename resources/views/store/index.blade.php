@extends('store.store')

@section('left-bar')
    <div class="col-sm-3">
        @include('partials._categories')
    </div>
@stop

@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Em destaque</h2>
            @include('partials._product', ['products' => $pFeatured])
        </div><!--features_items-->



        <div class="features_items"><!--recommended-->
            <h2 class="title text-center">Recomendados</h2>
            @include('partials._product', ['products' => $pRecommend])
        </div><!--recommended-->

    </div>
@stop