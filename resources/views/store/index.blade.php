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

            @foreach($pFeatured as $fProduct)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                @if(count($fProduct->images))
                                    <img src="{{ url('images/products/'.$fProduct->images->first()->id.'.'.$fProduct->images->first()->extension) }}" alt="" width="200"/>
                                @else
                                    <img src="{{ url('images/no-img.jpg') }}" alt="" width="200"/>
                                @endif
                                <h2>R${{ $fProduct->price }}</h2>
                                <p>{{ $fProduct->name }}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>R${{ $fProduct->price }}</h2>
                                    <p>{{ $fProduct->name }}</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div><!--features_items-->



        <div class="features_items"><!--recommended-->
            <h2 class="title text-center">Recomendados</h2>
            @foreach($pRecommend as $rProduct)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                @if(count($rProduct->images))
                                    <img src="{{ url('images/products/'.$rProduct->images->first()->id.'.'.$rProduct->images->first()->extension) }}" alt="" width="200"/>
                                @else
                                    <img src="{{ url('images/no-img.jpg') }}" alt="" width="200"/>
                                @endif
                                <h2>R${{ $rProduct->price }}</h2>
                                <p>{{ $rProduct->name }}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>R${{ $rProduct->price }}</h2>
                                    <p>{{ $rProduct->name }}</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div><!--recommended-->

    </div>
@stop