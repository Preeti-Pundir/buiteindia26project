<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StorePageController extends Controller
{
    //
    public function index()
    {
        return view('storeadmin.home');
    }

    public function store()
    {
        return view('storeadmin.usermange');
    }
}
