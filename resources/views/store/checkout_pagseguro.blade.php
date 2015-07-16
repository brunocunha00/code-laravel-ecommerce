@extends('store.store')

@section('left-sidebar')
    <div class="col-sm-3">
        @include('partials._categories')
    </div>
@endsection

@section('content')
    <div class="col-sm-9 padding-right">
        <h3>Recebemos sua intencao de pagamento.</h3>

        <h4>Aguarde alguns dias para que o sistema processo seu pagamento.</h4>

        <div class="panel panel-default">
            <div class="panel-title">Seu pedido sera enviado para:</div>
            <div class="panel-body">
                <ul class="list-group">
                    <li class="list-group-item">{{ $transaction->getShipping()->getAddress()->getStreet() }}, {{ $transaction->getShipping()->getAddress()->getNumber() }}</li>
                    <li class="list-group-item">{{ $transaction->getShipping()->getAddress()->getPostalCode() }}</li>
                    <li class="list-group-item">{{ $transaction->getShipping()->getAddress()->getCity() }}</li>
                    <li class="list-group-item">{{ $transaction->getShipping()->getAddress()->getState() }}</li>
                </ul>
            </div>

            <div class="panel-footer">
                Caso alguma informacao esteja errada, entre em contato com nosso atentimento.
            </div>
        </div>

    </div>
@endsection