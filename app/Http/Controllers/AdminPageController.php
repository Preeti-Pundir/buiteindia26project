<?php

namespace App\Http\Controllers;

use App\Models\store;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }

    public function store()
    {
        return view('admin.store.store');
    }

    public function storeedite($id)
    {
       $store= store::find($id)->first();
        return view('admin.store.storeupdate',["store"=>$store]);
    }
}
