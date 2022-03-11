<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jasa extends Model
{
    use HasFactory;
    protected $table = "jasas";

    protected $fillable = [
        
        'name',
        'slug',
        'address',
        'description',
        'price',
        'unit',
        'sale_price',
        'status',
        'quantity',
        'image',
        'user_id',
        'category_id',
        'subcategory_id',
        'province_id',
        'regency_id',
        'location_link',
    ];
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function subcategory(){
        return $this->belongsTo(Subcategory::class,'subcategory_id');
    }

    public function province(){
        return $this->belongsTo(Province::class,'province_id');
    }
    public function regency(){
        return $this->belongsTo(Regency::class,'regency_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function coupon(){
        return $this->hasOne(Coupon::class);
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class,'jasa_id');
    }

    public function advertisement(){
        return $this->hasOne(Advertisement::class);
    }

}
