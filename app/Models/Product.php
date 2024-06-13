<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function photoProduct() {
        return $this->hasMany(ProductPhoto::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
