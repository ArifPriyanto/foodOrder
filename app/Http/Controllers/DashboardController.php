<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Menu;
use App\Models\User;

class DashboardController extends Controller
{
    public function manager()
    {
        $totalOrder = Order::count();

        $totalRevenue = Order::where('status', 'selesai')
            ->sum('total');

        $totalCustomer = User::where('role', 'customer')->count();

        $latestOrders = Order::with('customer')
            ->latest()
            ->take(10)
            ->get();

        return view('manager.dashboard', compact(
            'totalOrder',
            'totalRevenue',
            'totalCustomer',
            'latestOrders'
        ));
    }

    public function cashier()
    {
        return view('cashier.dashboard');
    }

    public function driver()
    {
        $orders = Order::with('customer')
            ->where(function ($query) {
                $query->where('status', 'diproses')
                    ->whereNull('driver_id')
                    ->orWhere(function ($query) {
                        $query->where('status', 'diantar')
                            ->where('driver_id', auth()->id());
                    });
            })
            ->latest()
            ->get();

        return view('driver.dashboard', compact('orders'));
    }

    public function customer()
    {
        return view('customer.dashboard');
    }

    public function index()
    {
        $role = auth()->user()->role;

        return match ($role) {
            'manager' => redirect()->route('manager.dashboard'),
            'cashier' => redirect()->route('cashier.dashboard'),
            'driver'  => redirect()->route('driver.dashboard'),
            default => redirect()->route('customer.dashboard'),
        };
    }
}
