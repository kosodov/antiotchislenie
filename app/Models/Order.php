<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'status',
        'delivery_address',
        'delivery_time',
        // Другие поля заказа
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
