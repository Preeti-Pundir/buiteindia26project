<?php

namespace App\Providers;

use App\Models\Batch;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class FormList extends ServiceProvider
{
    public static function getCategories(){

        return Category::all()->pluck('name', 'id')->toArray();
    }

}
