<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $menus = Menu::where('stock', '>', 0)->get();

        return view('orders.index', compact('menus'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'menu_id' => ['required', 'integer', 'exists:menus,id'],
            'qty' => ['required', 'integer', 'min:1'],
        ]);

        DB::transaction(function () use ($validated) {
            $menu = Menu::lockForUpdate()->findOrFail($validated['menu_id']);

            if ($menu->stock < $validated['qty']) {
                abort(422, 'Stok menu tidak mencukupi.');
            }

            $order = Order::create([
                'customer_id' => auth()->id(),
                'total' => $menu->price * $validated['qty'],
                'status' => 'pending',
            ]);

            OrderItem::create([
                'order_id' => $order->id,
                'menu_id' => $menu->id,
                'qty' => $validated['qty'],
                'price' => $menu->price,
            ]);

            $menu->decrement('stock', $validated['qty']);
        });

        return redirect()->route('orders.index')
            ->with('success', 'Pesanan berhasil dibuat.');
    }
}
