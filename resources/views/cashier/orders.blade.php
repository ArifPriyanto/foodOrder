<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Daftar Pesanan Customer
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                <table class="min-w-full border border-gray-300">

                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-4 py-2">No</th>
                            <th class="border px-4 py-2">Customer</th>
                            <th class="border px-4 py-2">Total</th>
                            <th class="border px-4 py-2">Status</th>
                            <th class="border px-4 py-2">Tanggal</th>
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
                                {{ $order->customer->name ?? '-' }}
                            </td>

                            <td class="border px-4 py-2">
                                Rp {{ number_format($order->total,0,',','.') }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ ucfirst($order->status) }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ $order->created_at->format('d-m-Y H:i') }}
                            </td>

                            <td class="border px-4 py-2">

                                <a href="{{ route('cashier.show', $order) }}"
                                class="inline-block px-3 py-2 rounded bg-yellow-500 text-black">
                                    Detail
                                </a>

                            </td>

                        </tr>

                        @empty

                        <tr>
                            <td colspan="6" class="text-center py-4">
                                Belum ada pesanan.
                            </td>
                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</x-app-layout>