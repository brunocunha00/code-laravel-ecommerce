@extends('store.store')

@section('left-sidebar')
    <div class="col-sm-3">
        @include('partials._categories')
    </div>
@endsection

@section('content')
    <div class="col-sm-9 padding-right">
        <h3>Pedido #{{ $order->id }} realizado com sucesso!</h3>

        <h4>Valor Total: R${{ $order->total }}</h4>
    </div>
@endsection