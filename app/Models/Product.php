<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    public function subCategory() {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    } 

    public function supplier() {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    } 

    public function brand() {
        return $this->belongsTo(Brand::class, 'brand_id');
    } 

    public function price() {
        return $this->hasOne(Price::class);
    }

    public function color() {
        return $this->hasMany(Color::class);
    }

    public function size() {
        return $this->hasManyThrough(Size::class, Color::class);
    }
}
