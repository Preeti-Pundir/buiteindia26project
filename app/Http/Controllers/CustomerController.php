<?php

namespace App\Http\Controllers;

use app\helpers\helper;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;



class CustomerController extends Controller
{
    public function index(){
        $customer = Customer::all();
        //$userEmail = user_email();
        return view('customer.index',compact('customer'));
    }

    public function save(request $request){
        $customer_name = $request->name; 
        $customer_id = Helper::IDGenerator(new Customer, 'customer_id', 5, 'cus');
        return $request->input(); 

        $q= new customer;
        $q->customer_id = $customer_id;
        $q->name = $customer_name;
        $q->save();

    }
}
 