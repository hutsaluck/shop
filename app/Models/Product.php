<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'description', 'price', 'barcode', 'stock', 'cover'];

    /*
     *  @return mixed
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /*
     *  @return mixed
     */
    public function gallery()
    {
        return $this->hasOne(Gallery::class);
    }
}
