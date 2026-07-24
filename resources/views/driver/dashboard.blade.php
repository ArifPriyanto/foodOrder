<x-app-layout>

    <x-slot name="header"> 

        <h2 class="font-semibold text-xl text-gray-800">
            Dashboard Driver
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                <h3 class="text-lg font-bold mb-4">
                    Daftar Pesanan
                </h3>

                <table class="min-w-full border">

                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-4 py-2">No</th>
                            <th class="border px-4 py-2">Customer</th>
                            <th class="border px-4 py-2">Driver</th>
                            <th class="border px-4 py-2">Total</th>
                            <th class="border px-4 py-2">Status</th>
                            <th class="border px-4 py-2">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($orders as $order)

                    <tr>

                        <td class="border px-4 py-2">
                            {{ $loop->iteration }}
                        </td>

                        <td class="border px-4 py-2">
                            {{ $order->customer->name }}
                        </td>

                        <td class="border px-4 py-2">
                            {{ $order->driver->name ?? '-' }}
                        </td>

                        <td class="border px-4 py-2">
                            Rp {{ number_format($order->total,0,',','.') }}
                        </td>
                        <td>
                        @switch($order->status)

                                @case('pending')
                                    <span style="background:#6b7280;color:white;padding:6px 12px;border-radius:9999px;">
                                        Pending
                                    </span>
                                    @break

                                @case('diproses')
                                    <span style="background:#2563eb;color:white;padding:6px 12px;border-radius:9999px;">
                                        Diproses
                                    </span>
                                    @break

                                @case('diantar')
                                    <span style="background:#facc15;color:black;padding:6px 12px;border-radius:9999px;">
                                        Diantar
                                    </span>
                                    @break

                                @case('selesai')
                                    <span style="background:#16a34a;color:white;padding:6px 12px;border-radius:9999px;">
                                        Selesai
                                    </span>
                                    @break

                                @case('dibatalkan')
                                    <span style="background:#dc2626;color:white;padding:6px 12px;border-radius:9999px;">
                                        Dibatalkan
                                    </span>
                                    @break

                            @endswitch

                        </td>
                    <td class="border px-4 py-2">

                        @if($order->status == 'diproses')

                            <form method="POST" action="{{ route('driver.take', $order->id) }}">
                                @csrf
                                @method('PUT')

                                <button
                                    type="submit"
                                    style="background:#16a34a;color:white;padding:8px 14px;border:none;border-radius:8px;cursor:pointer;font-weight:600;">
                                    Ambil Pesanan
                                </button>

                            </form>

                        @elseif($order->status == 'diantar')

                            <form method="POST" action="{{ route('driver.finish', $order->id) }}">
                                @csrf
                                @method('PUT')

                                <button
                                    type="submit"
                                    style="background:#4f46e5;color:white;padding:8px 14px;border:none;border-radius:8px;cursor:pointer;font-weight:600;">
                                    Selesaikan
                                </button>

                            </form>

                        @else

                            <span style="color:#6b7280;">-</span>

                        @endif

                    </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="5" class="text-center py-4">
                            Tidak ada pesanan.
                        </td>
                    </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</x-app-layout>