<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table ="orders";

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function jasa(){
        return $this->belongsTo(Jasa::class,'jasa_id');
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }
    public function shipping(){
        return $this->hasOne(Shipping::class);
    }

    public function transaction(){
        return $this->hasOne(Transaction::class);
    }

    public function regency(){
        return $this->belongsTo(Regency::class,'regency_id');
    }

    public function province(){
        return $this->belongsTo(Province::class,'province_id');
    }
}
