<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;

class Product extends Model
{
    protected $fillable = ['category_id', 'image', 'name', 'stock', 'price', 'description', 'slug', 'brief_description', 'cutting_price', 'price_glossy', 'price_doff', 'price_hvs', 'price_art', 'price_art_cartoon'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
