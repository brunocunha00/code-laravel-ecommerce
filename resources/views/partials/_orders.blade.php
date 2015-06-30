<table class="table table-condensed table-striped">
    <thead>
    <tr>
        <td>#</td>
        <td>Total</td>
        <td>Status</td>
    </tr>
    </thead>
    <tbody>
    @forelse($orders as $order)
        <tr>
            <td>
                <p>{{ $order->id }}</p>
            </td>
            <td>
                <p>R${{ $order->total }}</p>
            </td>
            <td>
                <p>
                    {{ $order->statusName }}
                    @if(Auth::user()->is_admin)
                        <a href="{{ route('order_update_status', ['id' => $order->id]) }}" class="btn btn-primary btn-xs">up</a>
                    @endif
                </p>

            </td>
        </tr>
    @empty
        <tr>
            <td class="" colspan="3">
                <h4>No orders.</h4>
            </td>
        </tr>
    @endforelse
    </tbody>
</table>
