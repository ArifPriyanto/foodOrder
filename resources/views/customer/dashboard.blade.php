<x-app-layout>

    <div class="container mt-4">

        <h2>Daftar Menu</h2>

        <div class="row">

            @foreach($menus as $menu)

                <div class="col-md-4 mb-4">

                    <div class="card">

                        @if($menu->image)
                            <img src="{{ asset('storage/'.$menu->image) }}"
                                width="80"
                                class="rounded">
                        @endif

                        <div class="card-body">

                            <h5>{{ $menu->name }}</h5>

                            <p>
                                Rp {{ number_format($menu->price,0,',','.') }}
                            </p>

                            <form action="{{ route('customer.orders.store') }}"
                                  method="POST">

                                @csrf

                                <input type="hidden"
                                       name="menu_id"
                                       value="{{ $menu->id }}">

                                <input type="number"
                                       name="qty"
                                       value="1"
                                       min="1"
                                       class="form-control mb-2">

                                <button class="btn btn-primary w-100">
                                    Pesan
                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</x-app-layout>
