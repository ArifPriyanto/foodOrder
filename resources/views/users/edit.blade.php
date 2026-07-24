<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit User
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto">

            <div class="bg-white p-6 rounded shadow">

                <form action="{{ route('users.update', $user->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label>Nama</label>
                        <input type="text"
                               name="name"
                               value="{{ $user->name }}"
                               class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label>Email</label>
                        <input type="email"
                               name="email"
                               value="{{ $user->email }}"
                               class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label>Password Baru (Kosongkan jika tidak diubah)</label>
                        <input type="password"
                               name="password"
                               class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label>Role</label>

                        <select name="role"
                                class="w-full border rounded p-2">

                            <option value="manager"
                                {{ $user->role == 'manager' ? 'selected' : '' }}>
                                Manager
                            </option>

                            <option value="cashier"
                                {{ $user->role == 'cashier' ? 'selected' : '' }}>
                                Cashier
                            </option>

                            <option value="customer"
                                {{ $user->role == 'customer' ? 'selected' : '' }}>
                                Customer
                            </option>

                        </select>

                    </div>

                    <button class="bg-blue-600 text-white px-4 py-2 rounded">
                        Update
                    </button>

                    <a href="{{ route('users.index') }}"
                       class="bg-gray-500 text-white px-4 py-2 rounded">
                        Kembali
                    </a>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>