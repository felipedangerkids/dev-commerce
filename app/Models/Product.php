<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use App\Models\ProductToCategory;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{

    use HasSlug;

    protected $fillable = [
        'code',
        'name',
        'slug',
        'short_description',
        'colors',
        'family',
        'type_sale',
        'price',
        'promotional_price',
        'brand',
        'width',
        'height',
        'diameter',
        'weight',
        'description',
        'status',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function images()
    {
        return $this->hasMany(ImageToProduct::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, ProductToCategory::class, 'product_id', 'category_id');
    }
}
