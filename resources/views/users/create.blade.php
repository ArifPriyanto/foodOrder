<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah User
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto">

            <div class="bg-white p-6 rounded shadow">

                <form action="{{ route('users.store') }}" method="POST">

                    @csrf

                    <div class="mb-4">
                        <label>Nama</label>
                        <input type="text" name="name"
                               class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label>Email</label>
                        <input type="email" name="email"
                               class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label>Password</label>
                        <input type="password" name="password"
                               class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label>Role</label>

                        <select name="role"
                                class="w-full border rounded p-2">

                            <option value="manager">Manager</option>
                            <option value="cashier">Cashier</option>
                            <option value="customer">Customer</option>

                        </select>

                    </div>

                    <button
                        class="bg-blue-600 text-white px-4 py-2 rounded">
                        Simpan
                    </button>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>