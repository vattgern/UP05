<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Basket extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function products(){
        return $this->hasMany(Product::class, 'id', 'product_id');
    }
}
