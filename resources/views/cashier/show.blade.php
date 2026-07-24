<x-app-layout>

@if(session('success'))

<div class="bg-green-100 text-green-700 p-3 rounded mb-3">
    {{ session('success') }}
</div>

@endif

<div class="container mt-4">

    <h2>Detail Pesanan</h2>

    <div class="card">

        <div class="card-body">

            <p><strong>Customer :</strong> {{ $order->customer->name }}</p>
            <p><strong>Status Database:</strong> {{ $order->status }}</p>
            <p>
                <strong>Status :</strong>

                @if($order->status == 'pending')
                    <span class="inline-block px-3 py-1 rounded bg-red-600 text-white font-bold">
                        Pending
                    </span>

                @elseif($order->status == 'diproses')
                    <span class="inline-block px-3 py-1 rounded bg-blue-600 text-white font-bold">
                        Diproses
                    </span>

                @elseif($order->status == 'diantar')
                    <span class="inline-block px-3 py-1 rounded bg-yellow-500 text-black font-bold">
                        Diantar
                    </span>

                @elseif($order->status == 'selesai')
                    <span class="inline-block px-3 py-1 rounded bg-green-600 text-white font-bold">
                        Selesai
                    </span>
                @endif
            </p>

            <hr>

            <table class="table">

                <thead>
                    <tr>
                        <th>Menu</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>

                <tbody>

                @foreach($order->items as $item)

                <tr>

                    <td>{{ $item->menu->name }}</td>

                    <td>{{ $item->qty }}</td>

                    <td>Rp {{ number_format($item->price,0,',','.') }}</td>

                    <td>
                        Rp {{ number_format($item->qty * $item->price,0,',','.') }}
                    </td>

                </tr>

                @endforeach

                </tbody>

            </table>

            <h4>
                Total :
                Rp {{ number_format($order->total,0,',','.') }}
            </h4>

            @if($order->status == 'pending')

            <form action="{{ route('cashier.process', $order) }}" method="POST">

                @csrf
                @method('PUT')

                <button
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">

                    Proses Pesanan

                </button>

            </form>

            @endif

        </div>

    </div>

</div>

</x-app-layout>