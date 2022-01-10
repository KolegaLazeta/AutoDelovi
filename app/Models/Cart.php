<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Purchase;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo('\App\Models\Product', 'product_id');
    }
    
    public function purchase()
    {
        return $this->belongsTo('\App\Models\Purchase', 'purchase_id');
    }
}
