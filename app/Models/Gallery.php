<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    /*
     *  @return mixed
     */
    public function product(){
        return $this->belongsTo(Product::class);
    }

    /*
     *  @return mixed
     */
    public function  images(){
        return $this->hasMany(Image::class);
    }
}
