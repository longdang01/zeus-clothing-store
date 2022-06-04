<?php

namespace App\Models;

use App\Http\Controllers\api\CategoryController;
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
        return $this->hasOne(Price::class)->where('active',"1");
    }

    public function color() {
        return $this->hasMany(Color::class);
    }

    public function size() {
        return $this->hasManyThrough(Size::class, Color::class);
    }

    public function category() {
        return $this->hasOneThrough(Category::class, SubCategory::class,
        'id',
        'id',
        null,
        'id',
        );
    }
}
