<?php

namespace App\Models;

use App\Models\Product;
use Spatie\Sluggable\HasSlug;
use App\Models\ProductToCategory;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasSlug;

    protected $fillable = [
        'parent_id',
        'name',
        'slug',
        
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_to_categories');
    }

    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('childrenCategories');
    }

    public function childrenCategories()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('subcategories');
    }

    public function testes()
    {
         return $this->belongsToMany(ProductToCategory::class, 'category_id');
    }
 
}
