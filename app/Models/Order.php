<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_id',
        'driver_id',
        'total',
        'status',
    ];
    
    public function customer()
    {
        return $this->belongsTo(User::class,'customer_id');
    }

    public function driver()
    {
        return $this->belongsTo(User::class,'driver_id');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function cashierIndex()
    {
        $orders = Order::with('customer')
                    ->latest()
                    ->get();

        return view('cashier.orders', compact('orders'));
    }
}
