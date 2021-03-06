@extends('store.store')

@section('left-bar')
    <div class="col-sm-3">
        @include('partials._categories')
    </div>
@stop

@section('content')
    <div class="col-sm-9 padding-right">
        <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
                <div class="view-product">
                    @if(count($product->images))
                        <img src="{{ url('images/products/'.$product->images->first()->id.'.'.$product->images->first()->extension) }}" alt=""/>
                    @else
                        <img src="{{ url('images/no-img.jpg') }}" alt=""/>
                    @endif
                </div>
                <div id="similar-product" class="carousel slide" data-ride="carousel">

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            @forelse($product->images as $image)
                                <a href="#"><img src="{{ url('images/products/'.$image->id.'.'.$image->extension) }}" alt="" width="80"></a>
                            @empty
                                <img src="{{ url('images/no-img.jpg') }}" alt="" width="80">
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="row">
                    <div class="product-information"><!--/product-information-->

                        <h2>{{ $product->category->name }} :: {{ $product->name }}</h2>

                        <p>{{ $product->description }}</p>
                                <span>
                                    <span>R${{ $product->price }}</span>
                                        <a href="{{ route('cart_add', ['id' => $product->id]) }}" class="btn btn-fefault cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Adicionar no Carrinho
                                        </a>
                                </span>
                    </div>
                    <!--/product-information-->
                </div>
                <div class="row">
                    @forelse($product->tags as $tag)
                        <a href="{{ route('store_tag', ['id' => $tag->id]) }}" class="btn btn-default">{{ $tag->name }}</a>
                    @empty
                        <p>No Tags.</p>
                    @endforelse
                </div>

            </div>
        </div>
        <!--/product-details-->
    </div>
@stop