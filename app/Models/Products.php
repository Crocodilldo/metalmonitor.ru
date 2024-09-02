<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'category_id',
        'shop_id',
        'parameters',
        'price',
        'url',
        'updated_at'
    ];

    public function categories(){
        return $this->belongsTo(Categories::class);
    }

    public function shop(){
        return $this->belongsTo(Shops::class);
    }    
}