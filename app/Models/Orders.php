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
    public function ordersStatus(){
        return $this->hasMany(OrdersStatus::class);
    }
    public function customer(){
        return $this->belongsTo(customer::class,"customer_id");
    }
    public function payment(){
        return $this->belongsTo(payment::class,"payment_id");
    }
    public function transport(){
        return $this->belongsTo(transport::class,"transport_id");
    }
}
