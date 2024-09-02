<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdateLinks extends Model
{
    use HasFactory;

    public function categories(){
        return $this->belongsTo(Categories::class);
    }

    public function shop(){
        return $this->belongsTo(Shops::class);
    }
}
