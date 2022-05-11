<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;

    protected $table = 'cart_detail';

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    } 

    public function color() {
        return $this->belongsTo(Color::class, 'color_id');
    } 

    public function size() {
        return $this->belongsTo(Size::class, 'size_id');
    } 

}
