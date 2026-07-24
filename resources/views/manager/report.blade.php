<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Laporan Penjualan
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                <h3 class="text-lg font-bold mb-4">
                    Total Pendapatan
                </h3>

                <div class="mb-6 text-2xl font-bold text-green-600">
                    Rp {{ number_format($totalRevenue,0,',','.') }}
                </div>

                <table class="min-w-full border">

                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-4 py-2">No</th>
                            <th class="border px-4 py-2">Customer</th>
                            <th class="border px-4 py-2">Total</th>
                            <th class="border px-4 py-2">Tanggal</th>
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
                                Rp {{ number_format($order->total,0,',','.') }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ $order->created_at->format('d-m-Y H:i') }}
                            </td>

                        </tr>

                        @empty

                        <tr>
                            <td colspan="4" class="text-center py-4">
                                Belum ada data penjualan.
                            </td>
                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</x-app-layout>