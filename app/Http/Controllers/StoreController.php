<?php

namespace App\Http\Controllers;

use App\Models\store;
use App\Models\storestore;
use Illuminate\Cache\RedisTaggedCache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$storestore =  storestore::all(); 
        $stores=store::all();
       
        //return view('admin.stores.index',compact('storestore'));
         return view('admin.stores.index',compact('stores'));
       // return view("admin.store.storelist",["store"=>store::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.stores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $store= Store::create([

            'name' => $request->name,
            'email' =>$request->email,
            'store_code' =>$request->store_code,
            'address' =>  $request->address,
            'city' =>$request->city,
           
        ]);
        return redirect()->back()->with('success', 'Store successfully stored.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(store $store,$id)
    {
        $stores= store::all($id);
        return view('admin.stores.show',compact('stores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(store $store)
    {
        $stores = store::all();
        return view('admin.stores.edit',compact('stores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, store $store,$id)
    {
        //
    //    return $store->find($id)->update([
    //     "name"=>$req->name,
    //     "store_code"=>$req->store_code,
    //     "contact_no"=>$req->contact_no,
    //     "address"=>$req->address,
    //     "city"=>$req->city,
    //     "state"=>$req->state,
    //     "pincode"=>$req->pincode,
    //     "status"=>$req->status,
    //    ]);

    //    return redirect()->route('storelist');
        $store->update([
        'name'=> $request->name,
        'email'=>$request->email,
        'store_id'=> $request->store_id,
        'address' =>$request->categury_id,
        'city' =>$request->price,
        
    ]);

    return redirect()->back()->with('success', 'Store successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(store $store,$id)
    {
        //
        $store->delete($id);
        return redirect()->back();
    }
}
