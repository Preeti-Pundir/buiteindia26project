<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class storestore extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'store_code',
        'address',
        'city'
    ];
}
