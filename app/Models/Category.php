<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'parent_id', 'status'];

    // Alt kateqoriyaları gətirmək üçün
    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // Üst kateqoriyasını tapmaq üçün
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}