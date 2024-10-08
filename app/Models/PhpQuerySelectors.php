<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhpQuerySelectors extends Model
{
    use HasFactory;

    public function shop(){
        return $this->belongsTo(Shops::class);
    }
}
