<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'store_id',
        'categury_id',
        'brand_id',
        'price',
        'disc',
      ];
      // public function brand()
      // {
      //      return $this->belongsTo(Brand::class);
      // }
     public function ProductImage()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function productcategury(){
      return $this->hasMany(productcategury::class);
    }
}
