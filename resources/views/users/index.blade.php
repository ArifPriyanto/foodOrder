<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data User
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-6 rounded shadow">

            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

                <a href="{{ route('users.create') }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded">
                    + Tambah User
                </a>

                <table class="table-auto w-full mt-5 border">

                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border p-2">No</th>
                            <th class="border p-2">Nama</th>
                            <th class="border p-2">Email</th>
                            <th class="border p-2">Role</th>
                            <th class="border p-2">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                    @foreach($users as $user)

                    <tr>
                        <td class="border p-2">{{ $loop->iteration }}</td>
                        <td class="border p-2">{{ $user->name }}</td>
                        <td class="border p-2">{{ $user->email }}</td>
                        <td class="border p-2">{{ ucfirst($user->role) }}</td>
                        <td class="border p-2">
                            <a href="{{ route('users.edit', $user->id) }}"
                            class="inline-block px-3 py-2 rounded bg-yellow-500 text-black font-semibold border border-yellow-700 hover:bg-yellow-600">
                                Edit
                            </a>
                            <form action="{{ route('users.destroy', $user->id) }}"
                                method="POST"
                                style="display:inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Yakin ingin menghapus user ini?')"
                                    class="bg-red-600 text-white px-3 py-1 rounded">
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