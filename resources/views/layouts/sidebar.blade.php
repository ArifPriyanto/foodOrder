<div class="bg-dark text-white p-3 vh-100" style="width:250px;">

    <h4 class="mb-4">
        <i class="bi bi-basket-fill"></i>
        Food Order
    </h4>

    <div class="list-group">

        @if(Auth::user()->role === 'manager')

        <a href="{{ route('manager.dashboard') }}"
           class="list-group-item list-group-item-action">
            <i class="bi bi-speedometer2"></i>
            Dashboard
        </a>

        <a href="{{ route('menus.index') }}"
           class="list-group-item list-group-item-action">
            <i class="bi bi-cup-hot"></i>
            Menu
        </a>

        <a href="{{ route('categories.index') }}"
           class="list-group-item list-group-item-action">
            <i class="bi bi-grid"></i>
            Kategori
        </a>

        <a href="{{ route('users.index') }}"
           class="list-group-item list-group-item-action">
            <i class="bi bi-people"></i>
            User
        </a>

        <a href="{{ route('manager.report') }}"
           class="list-group-item list-group-item-action">
            <i class="bi bi-bar-chart"></i>
            Laporan
        </a>

        @elseif(Auth::user()->role === 'cashier')

        <a href="{{ route('cashier.dashboard') }}"
           class="list-group-item list-group-item-action">
            Dashboard Kasir
        </a>

        <a href="{{ route('cashier.orders') }}"
           class="list-group-item list-group-item-action">
            Pesanan
        </a>

        @elseif(Auth::user()->role === 'driver')

        <a href="{{ route('driver.dashboard') }}"
           class="list-group-item list-group-item-action">
            Dashboard Driver
        </a>

        <a href="{{ route('driver.orders') }}"
           class="list-group-item list-group-item-action">
            Pesanan Pengantaran
        </a>

        @else

        <a href="{{ route('customer.dashboard') }}"
           class="list-group-item list-group-item-action">
            Dashboard Customer
        </a>

        <a href="{{ route('orders.index') }}"
           class="list-group-item list-group-item-action">
            Buat Pesanan
        </a>

        @endif

    </div>

</div>
