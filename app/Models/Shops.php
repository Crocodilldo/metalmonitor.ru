<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shops extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
        'logo'

    ];

    public function updateLinks()
    {
        return $this->hasMany(UpdateLinks::class);
    }

    public function phpQuerySelectors()
    {
        return $this->hasMany(PhpQuerySelectors::class);
    }

    public function products()
    {
        return $this->hasMany(Products::class);
    }
}
