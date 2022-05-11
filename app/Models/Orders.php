<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';

    public function ordersDetails() {
        return $this->hasMany(OrdersDetail::class);
    }

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function payment() {
        return $this->belongsTo(Payment::class);
    }

    public function transport() {
        return $this->belongsTo(Transport::class);
    }
}
