<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();

        return view('orders.index', compact('menus'));
    }

    public function cashierIndex()
    {
        $orders = Order::with('customer')->latest()->get();

        return view('cashier.orders', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $menu = Menu::findOrFail($request->menu_id);

        $total = $menu->price * $request->qty;

        $order = Order::create([
            'customer_id' => Auth::id(),
            'total' => $total,
            'status' => 'pending',
        ]);

        OrderItem::create([
            'order_id' => $order->id,
            'menu_id' => $menu->id,
            'qty' => $request->qty,
            'price' => $menu->price,
        ]);

        return redirect()
            ->route('orders.index')
            ->with('success','Pesanan berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function cashierShow(Order $order)
    {
        $order->load('customer', 'items.menu');

        return view('cashier.show', compact('order'));
    }

    public function processOrder(Order $order)
    {
        if ($order->status == 'pending') {

            $order->update([
                'status' => 'diproses'
            ]);
        }

        return redirect()
            ->route('cashier.show', $order)
            ->with('success', 'Pesanan berhasil diproses.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function driverIndex()
    {
        $orders = Order::with('customer')
            ->where('status', 'diproses')
            ->latest()
            ->get();

        return view('driver.orders', compact('orders'));
    }

    public function driverShow(Order $order)
    {
        abort_unless(
            ($order->status === 'diproses' && $order->driver_id === null)
            || $order->driver_id === auth()->id(),
            403
        );

        $order->load('customer', 'items.menu');

        return view('driver.show', compact('order'));
    }

    public function driverTake(Order $order)
    {
        $updated = Order::whereKey($order->id)
            ->where('status', 'diproses')
            ->whereNull('driver_id')
            ->update([
            'status' => 'diantar',
            'driver_id' => auth()->id(),
        ]);

        abort_if($updated === 0, 409, 'Pesanan tidak tersedia untuk diambil.');

        return back()->with('success', 'Pesanan sedang diantar.');
    }

    public function driverFinish(Order $order)
    {
        $updated = Order::whereKey($order->id)
            ->where('status', 'diantar')
            ->where('driver_id', auth()->id())
            ->update([
            'status' => 'selesai',
        ]);

        abort_if($updated === 0, 403, 'Pesanan ini bukan tanggung jawab Anda.');

        return back()->with('success', 'Pesanan selesai diantar.');
    }

    public function report(Request $request)
    {
        $orders = Order::with('customer')
            ->where('status', 'selesai');

        if ($request->filled('start_date') && $request->filled('end_date')) {

            $orders->whereBetween('created_at', [
                $request->start_date . ' 00:00:00',
                $request->end_date . ' 23:59:59'
            ]);
        }

        $orders = $orders->latest()->get();

        $totalRevenue = $orders->sum('total');

        return view('manager.report', compact(
            'orders',
            'totalRevenue'
        ));
    }
}
