<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function images(){
        return $this->hasMany(ProductImage::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class,'product_tags')->withTimestamps();
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function productImages(){
        return $this->hasMany(ProductImage::class);
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }



}
