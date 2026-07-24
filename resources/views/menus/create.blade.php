<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black">
            Tambah Menu
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto">

            <div class="bg-white p-6 rounded shadow">
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('menus.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="mb-4">
                        <label class="block mb-2">Kategori</label>

                        <select name="category_id"
                                class="w-full border rounded p-2">

                            <option value="">Pilih Kategori</option>

                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2">Nama Menu</label>

                        <input type="text"
                               name="name"
                               class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2">Harga</label>

                        <input type="number"
                               name="price"
                               class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2">Stok</label>

                        <input type="number"
                               name="stock"
                               class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2">Deskripsi</label>

                        <textarea name="description"
                                  rows="4"
                                  class="w-full border rounded p-2"></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2">Foto Menu</label>

                        <input type="file"
                               name="image"
                               class="w-full border rounded p-2">
                    </div>

                    <button
                        class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">
                        Simpan
                    </button>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>