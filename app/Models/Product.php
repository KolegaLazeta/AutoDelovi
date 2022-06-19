<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    public function category()
    {
        return $this->belongsTo('\App\Models\Category', 'category_id');
    }
    
    public function brand()
    {
        return $this->belongsTo('\App\Models\Brand', 'brand_id');
    }
    
    public function comment()
    {
        return $this->hasMany('\App\Models\Comment');
    }
    
    public function purchases()
    {
        return $this->belongsTo(Purchase::class);
    }

    public function solds()
    {
        return $this->hasMany('\App\Models\SoldProduct');
    }

    
    protected $fillable = ['name', 'description', 'rating', 'image', 'price', 'category_id', 'brand_id', 'vehicle_type'];
}
