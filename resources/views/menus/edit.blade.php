<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Menu
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-6 rounded shadow">

                <form action="{{ route('menus.update', $menu->id) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label>Kategori</label>

                        <select name="category_id"
                                class="w-full border rounded p-2">

                            @foreach($categories as $category)

                                <option value="{{ $category->id }}"
                                    {{ $menu->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>

                            @endforeach

                        </select>
                    </div>

                    <div class="mb-4">
                        <label>Nama Menu</label>

                        <input type="text"
                               name="name"
                               value="{{ $menu->name }}"
                               class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label>Harga</label>

                        <input type="number"
                               name="price"
                               value="{{ $menu->price }}"
                               class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label>Stok</label>

                        <input type="number"
                               name="stock"
                               value="{{ $menu->stock }}"
                               class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label>Deskripsi</label>

                        <textarea name="description"
                                  class="w-full border rounded p-2"
                                  rows="4">{{ $menu->description }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label>Ganti Gambar (Opsional)</label>

                        @if($menu->image)
                            <img src="{{ asset('storage/' . $menu->image) }}"
                                width="150"
                                class="mb-3 rounded border">
                        @endif

                        <input type="file"
                               name="image"
                               class="w-full border rounded p-2">
                    </div>

                    <button class="bg-blue-600 text-white px-4 py-2 rounded">
                        Update Menu
                    </button>

                    <a href="{{ route('menus.index') }}"
                       class="bg-gray-500 text-white px-4 py-2 rounded">
                        Kembali
                    </a>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>