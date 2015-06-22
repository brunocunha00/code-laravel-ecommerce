@extends('store.store')

@section('content')
    <section id="cart_items">
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="image">Item</td>
                    <td class="description"></td>
                    <td class="price">Price</td>
                    <td class="price">Qtd</td>
                    <td class="price">Total</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                @forelse($cart->all() as $k=>$item)
                    <tr>
                        <td class="cart_product">
                            <a href="{{ route('store_product', ['id' => $k]) }}">
                                Imagem
                            </a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="{{ route('store_product', ['id' => $k]) }}">{{$item['name']}}</a></h4>
                            <p>Código: {{ $k }}</p>
                        </td>
                        <td class="cart_price">
                            R$ {{ $item['price'] }}
                        </td>
                        <td class="cart_quantity">
                            {{ $item['qtd'] }}
                            <div class="btn-group btn-group-xs" role="group" aria-label="...">
                                <a href="{{ route('cart_add', ['id' => $k]) }}" class="btn btn-default">+</a>
                                <a href="{{ route('cart_removeQtd', ['id' => $k]) }}" class="btn btn-default">-</a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">R${{ $item['price'] * $item['qtd'] }}</p>
                        </td>
                        <td>
                            <a href="{{ route('cart_destroy', ['id' => $k]) }}" class="btn btn-default">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="" colspan="6">
                            <h4>No products</h4>
                        </td>
                    </tr>
                @endforelse
                <tr class="cart_menu">
                    <td colspan="6">
                        <div class="pull-right">
                                <span>
                                    Total: R$ {{ $cart->getTotal() }}
                                    <a href="{{ route('checkout_place') }}" class="btn btn-success">Close Cart</a>
                                </span>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection