<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staff';
    public function users(){
        return $this->belongsTo(users::class,"users_id");
    }
    public function position(){
        return $this->belongsTo(position::class,"position_id");
    }
    public function role(){
        return $this->belongsTo(role::class,"role_id");
    }
}
