<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable = [
        'name',
        'price',
        // Другие поля блюда
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items');
    }
}
