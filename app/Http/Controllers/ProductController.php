<?php

namespace App\Http\Controllers;

use App\Contracts\CategoryContract;
use App\Contracts\ProductContract;
use App\Models\product;
use App\Models\productcategury;
use Illuminate\Http\Request;
//use App\Http\Middleware\auth;
//use Illuminate\Support\Facades\Auth;
use auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth as FacadesAuth;





class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $categoryRepository;

    protected $productRepository;

    // public function __construct(

    //     // BrandContract $brandRepository,
    //     CategoryContract $categoryRepository,
    //     ProductContract $productRepository
    // )
    // {
    //     // $this->brandRepository = $brandRepository;
    //     $this->categoryRepository = $categoryRepository;
    //     $this->productRepository = $productRepository;
    // }
    public function AllProduct()
    {
        $productcateguries =  productcategury::get();
        $all_product =Product::get();
        //return $all_product;
        return view('admin.page.products.allProduct',compact("all_product",'productcateguries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function AddProduct(Request $request)
    {


        $validatedData = $request->validate([
            'product_name' => 'required',

        ],
        [
            'product_name.required' => 'Please Input Product Name',

        ]);
             // Elequent method 1

             Product::insert([
                'name' =>$request->product_name,
                'store_id' => $request->store_id,
                'categury_id' => $request->categury_id,
                'disc'=>$request->disc,
                'price'=>$request->price,
                // 'user_price'=>$request->user_price,
                // 'created_at'=>Carbon::now()
        ]);

               return Redirect()->back()->with('success','Product Inserted Successfully');
    }

    public function index()
    {
        $products = Product::get();
        return view('admin.product.index',compact('products'));
       // return response(["product"=>product::all()],200);
    }

    public function cart()
    {
        return view('cart');
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::create([
            
            'name'=> $request->name,
            'store_id'=> $request->store_id,
            'categury_id' =>$request->categury_id,
            'brand_id' =>$request->brand_id,
            'price' =>$request->price,
            'disc' =>$request->disc,
            
        ]);

        return redirect()->back()->with('success', 'Product successfully stored.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product,$id)
    {
        // $product = Product::Findforfail($id);
        $products = Product::all($id);
  
        return view('admin.product.show',compact('products'));
       // return response(["product"=>$product->where("slug",$id)->get()],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        // $products= Product::findforfail($product);
        //$products = Product::get();
        return view('admin.product.edit',compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product , $id)
    {
       

        $product->update([
            'name'=> $request->name,
            'store_id'=> $request->store_id,
            'brand_id' =>$request->brand_id,
            'categury_id' =>$request->categury_id,
            'price' =>$request->price,
            'disc' =>$request->disc,
            
           
        ]);

        return redirect()->back()->with('success', 'Product successfully updated.');
        // $params = $request->except('_token');

        // $product = $this->productRepository->updateProduct($params);

        // if (!$product) {
        //     return $this->responseRedirectBack('Error occurred while updating product.', 'error', true, true);
        // }
        // return Redirect()->back()->with('success','Product Updated Successfully');
      //  return $this->responseRedirect('admin.products.index', 'Product updated successfully' ,'success',false, false);

      if($request->id && $request->quantity){
        $cart = session()->get('cart');
        $cart[$request->id]["quantity"] = $request->quantity;
        session()->put('cart', $cart);
        session()->flash('success', 'Cart updated successfully');
            }
        

    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product, $id)
    {
       
        $products = Product::all();
        $products->delete();

        return redirect()->back()->with('success', 'Product successfully deleted.');
    }
}
