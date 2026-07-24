<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; 

class DriverController extends Controller
{
    public function index()
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
}
