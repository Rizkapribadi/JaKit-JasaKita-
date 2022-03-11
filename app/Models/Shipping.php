<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;
    protected $table = "shippings";

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function regency(){
        return $this->belongsTo(Regency::class);
    }

    public function province(){
        return $this->belongsTo(Province::class);
    }
    
}
