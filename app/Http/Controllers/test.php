<?php

namespace App\Http\Controllers;

use App\Models\{costomer, store,product,productcategury,productimg};
use Illuminate\Http\Request;

class test extends Controller
{
    //
    public function addStore(Request $req){
        $store=new store;
        $store->name=$req->name;
        $store->store_code=random_int(1111,9999);
        $store->email=$req->email;
        $store->contact_no=$req->mobail;
        $store->address=$req->address;
        $store->city=$req->city;
        $store->state=$req->state;
        $store->pincode=$req->pincode;
        $store->save();

        return response(["msg"=>"store created"],200);
    }

    public function addProduct(Request $req){
        $product=new product;
        $product->name=$req->name;
        $product->store_id=random_int(1111,9999);
        $product->categury_id =$req->categury_id;
        $product->slug=$req->slug;
        $product->price=$req->user_price;
        $product->user_price=$req->user_price;
        $product->disc=$req->disc;
        $product->short_disc=$req->short_disc;
        $product->cover_img=$req->cover_img;
        $product->Key_features=$req->Key_features;
        $product->save();

        return response(["msg"=>"product created"],200);
    }

    public function addCategury(Request $req){
        $categury=new productcategury;
        $categury->store_id=$req->store_id;
        $categury->name=$req->name;
        $categury->slug=$req->slug;
        $categury->save();

        return response(["msg"=>"categury created"],200);
    }

    public function addUser(Request $req){
        $costomer=new costomer;
        $costomer->store_id=$req->store_id;
        $costomer->name=$req->name;
        $costomer->email=$req->email;
        $costomer->phone_no=$req->phone_no;
        $costomer->password=$req->slug;
        $costomer->save();

        return response(["msg"=>"costomer created"],200);
    }


}
