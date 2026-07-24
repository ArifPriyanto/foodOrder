@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row mb-4">

    <div class="alert alert-success m-3">
    Bootstrap Berhasil
</div>

        <div class="col-md-4">
            <div class="card shadow border-0 bg-primary text-white">
                <div class="card-body">
                    <h6>Total Pesanan</h6>
                    <h2>{{ $totalOrder }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow border-0 bg-success text-white">
                <div class="card-body">
                    <h6>Total Pendapatan</h6>
                    <h2>
                        Rp {{ number_format($totalRevenue,0,',','.') }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow border-0 bg-warning">
                <div class="card-body">
                    <h6>Jumlah Customer</h6>
                    <h2>{{ $totalCustomer }}</h2>
                </div>
            </div>
        </div>

    </div>

    <div class="card shadow border-0">

        <div class="card-header fw-bold">
            Menu Cepat
        </div>

        <div class="card-body">

            <div class="row g-3">

                <div class="col-md-3">
                    <a href="{{ route('menus.index') }}" class="btn btn-primary w-100 py-3">
                        🍔 Kelola Menu
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="{{ route('categories.index') }}" class="btn btn-success w-100 py-3">
                        📂 Kategori
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="{{ route('users.index') }}" class="btn btn-warning w-100 py-3">
                        👥 User
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="{{ route('manager.report') }}" class="btn btn-danger w-100 py-3">
                        📊 Laporan
                    </a>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection