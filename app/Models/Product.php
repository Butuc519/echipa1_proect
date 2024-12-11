<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'nume',
        'imagine',
        'descriere',
        'pret',
        'stoc',
        'category_id',
    ];

    // Relație cu modelul Category
    public function categorie()
    {
        return $this->belongsTo(Category::class, 'categorie_id');
    }
}
