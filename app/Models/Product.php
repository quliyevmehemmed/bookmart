<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'author', 
        'slug', 
        'description', 
        'price', 
        'image', 
        'category_id', 
        'stock', 
        'is_active'
    ];

    // Kitabın aid olduğu kateqoriyanı tapmaq üçün (belongsTo)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
