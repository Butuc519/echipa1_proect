<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'nume',
    ];

    // Relație cu modelul Product
    public function products()
    {
        return $this->hasMany(Product::class, 'categorie_id');
    }
}
