<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'user_id',
        'order_number',
        'full_name',
        'phone',
        'email',
        'address',
        'shipping_method',
        'shipping_price',
        'total_price',
        'payment_method',
        'status',
        'note',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
