<ul>
    @foreach ($orders as $order)
        <li>
            <b>{{ $order->customer_name }}</b>
            <ul>
                @foreach ($order->statuses as $status)
                    <li>{{ $status->pivot->created_at }}: {{ $status->name }}</li>
                @endforeach
            </ul>
        </li>
    @endforeach
</ul>
