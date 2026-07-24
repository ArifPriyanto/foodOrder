<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Kategori
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <a href="{{ route('categories.create') }}"
                   class="bg-blue-500 text-white px-4 py-2 rounded">
                    Tambah Kategori
                </a>

                <table class="table-auto w-full mt-5 border">

                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border p-2">No</th>
                            <th class="border p-2">Nama</th>
                            <th class="border p-2">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                    @foreach($categories as $category)

                    <tr>
                        <td class="border p-2">{{ $loop->iteration }}</td>

                        <td class="border p-2">
                            {{ $category->name }}
                        </td>

                        <td class="border p-2">

                            <a href="{{ route('categories.edit', $category->id) }}"
                                class="inline-block px-3 py-2 rounded bg-yellow-500 text-black font-semibold border border-yellow-700 hover:bg-yellow-600">
                                Edit
                            </a>
                            <form
                                action="{{ route('categories.destroy',$category->id) }}"
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

                    @endforeach

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</x-app-layout>