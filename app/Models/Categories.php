<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    public function updateLinks(){
        return $this->hasMany(UpdateLinks::class);
    }

    public function products()
    {
        return $this->hasMany(Products::class);
    }
}
