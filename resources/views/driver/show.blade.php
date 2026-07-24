@if($order->status=='diproses')

<form action="{{ route('driver.take',$order) }}" method="POST">

    @csrf
    @method('PUT')

    <button
        class="bg-green-600 text-white px-4 py-2 rounded">

        Ambil Pesanan

    </button>

</form>

@endif