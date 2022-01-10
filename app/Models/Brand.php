<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 

class Brand extends Model
{
    use HasFactory;
    
    public function products()
    {
        return $this->hasMany('\App\Models\Product', 'brand_id', 'id');
    }
    
    protected $fillable = ['name', 'image'];

}
