<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Menu
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-6 rounded shadow">

                <a href="{{ route('menus.create') }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                    + Tambah Menu
                </a>

                <table class="table-auto w-full mt-5 border">

                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border p-2">No</th>
                            <th class="border p-2">Gambar</th>
                            <th class="border p-2">Kategori</th>
                            <th class="border p-2">Nama Menu</th>
                            <th class="border p-2">Harga</th>
                            <th class="border p-2">Stok</th>
                            <th class="border p-2">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($menus as $menu)

                    <tr>

                        <td class="border p-2">
                            {{ $loop->iteration }}
                        </td>

                        <td class="border p-2 text-center">
                            @if($menu->image)
                                <img src="{{ asset('storage/' . $menu->image) }}"
                                    width="80"
                                    class="rounded">
                            @else
                                Tidak ada gambar
                            @endif
                        </td>

                        <td class="border p-2">
                            {{ $menu->category->name }}
                        </td>

                        <td class="border p-2">
                            {{ $menu->name }}
                        </td>

                        <td class="border p-2">
                            Rp {{ number_format($menu->price) }}
                        </td>

                        <td class="border p-2">
                            {{ $menu->stock }}
                        </td>

                        <td class="border p-2">

                            <a href="{{ route('menus.edit', $menu->id) }}"
                             class="inline-block px-3 py-2 rounded bg-yellow-500 text-black font-semibold border border-yellow-700 hover:bg-yellow-600">
                                Edit
                            </a>

                            <form action="{{ route('menus.destroy', $menu->id) }}"
                                method="POST"
                                style="display:inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="bg-red-600 text-white px-3 py-1 rounded"
                                    onclick="return confirm('Yakin hapus?')">
                                    Hapus
                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="7" class="text-center p-4">
                            Belum ada menu.
                        </td>
                    </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</x-app-layout>