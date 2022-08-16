<?php

use App\Contracts\ProductContract;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{  AdminPageController,StorePageController,AuthContoller,BrandController, BrandsController,ImageController, ImageGalleryController, OrderController, plancontroller, PlansController, ProductController,ProductImageController, StoreController, SubscriptionController, testcontroller, TestingHelperController};
//use app\http\Controllers\HomeController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\CustomerController;
use App\http\Controllers\checkcontroller;
use App\Http\Controllers\UploadController;
Use App\Http\Controllers\HomeController;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
route::get('add',[CustomerController::class,'index']);
       


        Route::get('/',[AuthContoller::class,"login"])->name('login')->middleware('authcheck');
        Route::post('/login',[AuthContoller::class,"logincheck"])->name('logincheck');
        Route::get('/logout',[AuthContoller::class,"logout"])->name('logout');
        Route::get('/test',function (Request $req)
        {
            $user=User::find($req->id);
            $user->update([
                "password"=>Hash::make($req->pass)
            ]);
            return "password updated ".$user->name;
            // $req->session()->forget('login');
            // return redirect(route('login'));
        })->name('test');
// Auth::routes();
// StoreAuth::routes();

//admin routes
Route::prefix('admin')->group(function () {
        Route::middleware(['auth'])->group(function () {
       
                Route::get('/home', [AdminPageController::class, 'index'])->name('adminhome');
                //store create
                Route::get('/store', [AdminPageController::class, 'store'])->name('storecreate');
                //store list
                Route::get('/storelist', [StoreController::class, 'index'])->name('storelist');
                //store update
                Route::get('/storedite/{id}', [AdminPageController::class, 'storeedite'])->name('storeedite');
                Route::post('/storeedite/{id}', [StoreController::class, 'update'])->name('storedite');
                //store delate
                Route::get('/storedelete/{id}', [StoreController::class, 'destroy'])->name('storedelate');
        });
});

//store admin
Route::prefix('store')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/home', [StorePageController::class, 'index'])->name('storehome');
        Route::get('/usersmange', [StorePageController::class, 'store'])->name('storeusersmange');
        Route::get('image-upload',ImageController::class,'imageUpload');
        Route::post('image-upload',ImageController::class,'imageUploadPost');
         
        Route::get('AddProduct',[ProductController::class,'AddProduct']);
        Route::get('allproduct',[ProductController::class,'AllProduct']);
        Route::get('index',[ProductController::class,'index'])->name('admin.product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('admin.product.create');
        Route::get('/show/{id}', [ProductController::class, 'show'])->name('admin.product.show');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
        Route::post('/store', [ProductController::class, 'store'])->name('admin.product.store');
        Route::post('/delete/{id}', [ProductController::class, 'destroy'])->name('admin.product.delete');
        Route::get('cart', [ProductController::class, 'cart'])->name('cart');
        Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');
        Route::patch('update-cart', [ProductController::class, 'update'])->name('update.cart');
        Route::delete('remove-from-cart', [ProductController::class, 'remove'])->name('remove.from.cart');
        //Route::get('/add-t', [CustomerController::class, 'index']);
        // Route::get('/add',[CustomerController::class,'index']);
          //route::resource('admin/plan/',plancontroller::class);
          
         
            Route::get('brands/',[BrandController::class,'index'])->name('admin.brands.index');
            Route::get('brands/create',[BrandController::class,'create'])->name('admin.brands.create');
            Route::post('brands/show',[BrandController::class,'show'])->name('admin.brands.show');
            Route::post('brands/store',[BrandController::class,'store'])->name('admin.brands.store');
            Route::get('brands/{id}/edit',[BrandController::class,'edit'])->name('admin.brands.edit');
            Route::post('brands/update',[BrandController::class,'update'])->name('admin.brands.update');
            Route::get('brands/{id}/delete',[BrandController::class,'delete'])->name('admin.brands.delete');

            route::get('add',[CustomerController::class,'index'])->name('customer>index');
            route::post('save',[CustomerController::class,'save'])->name('customer.save');

            //plan and their subscription
            route::get('plan/index',[PlansController::class,'index'])->name('admin.plans.index');
           // route::get('plan/plan',[PlansController::class,'show'])->nae('admin.plans.show');
            // route::get('plan/show/{id}',[PlansController::class,'show'])->name('admin.plan.show');
            // route::get('plan/{id}/edit',[PlansController::class,'edit'])->name('admin.plan.edit');
            // route::get('plan/update',[PlansController::class,'update'])->name('admin.plan.update');
            // route::get('plan/{}/delete',[PlansController::class,'delete'])->name('admin.plan.delete');
            //route::post('subscription',[SubscriptionController::class,'create'])->name('subscription.create');
            //Route::post('/subscription', SubscriptionController::class,'create')->name('subscription.create');

        

    });
});


            // route::get('add',[CustomerController::class,'index']);
            // route::post('save',[CustomerController::class,'save'])->name('customer.save');
       

         Route::get('/multiuploads', [UploadController::class,'uploadForm']);
         Route::post('/multiuploads', [UploadController::class,'uploadSubmit']);

        route::get('check',[checkcontroller::class,'index']);

         route::get('test2',[testcontroller::class,'index'])->name('customer.index');

 
        route::get('testtest',[TestingHelperController::class,'index']);

        // route::get('add',[CustomerController::class,'index'])->name('customer>index');
        // route::post('save',[CustomerController::class,'save'])->name('customer.save');
       




//route::resource('plan',plancontroller::class);
//Route::post('/subscription', SubscriptionController::class,'create')->name('subscription.create');


         Route::get('image-upload',[App\Http\Controllers\ImageController::class,'imageUpload']);
         Route::post('image-upload',[App\Http\Controllers\ImageController::class,'imageUploadPost']);
         
         Route::post('images/upload', [ProductImageController::class,'upload'])->name('admin.products.images.upload');
         Route::get('images/{id}/delete', [ProductImageController::class,'delete'])->name('admin.products.images.delete');

        
        
        
        Route::group(['prefix'  =>   'stores'], function() {
                    Route::get('index',[StoreController::class,'index'])->name('admin.stores.index');
                    Route::get('/create', [StoreController::class, 'create'])->name('admin.stores.create');
                    Route::get('/show/{id}', [StoreController::class, 'show'])->name('admin.stores.show');
                    Route::get('/edit/{id}', [StoreController::class, 'edit'])->name('admin.stores.edit');
                    Route::post('/update/{id}', [StoreController::class, 'update'])->name('admin.stores.update');
                    Route::post('/store', [StoreController::class, 'store'])->name('admin.stores.store');
                    Route::post('/delete/{id}', [StoreController::class, 'destroy'])->name('admin.stores.delete');

        });

        
        // Route::get('users/{id}/payments', 	UserPaymentsController::class,'index')->name('user.payments');
        // Route::post('users/{id}/payments', 	UserPaymentsController::class,'store')->name('user.payments.store');
        // Route::delete('users/{id}/payments/{payment_id}', 	UserPaymentsController::class,'destroy')->name('user.payments.destroy');


    //    Route::prefix('payment')->group(function () {
    //         Route::group(['middleware' => 'auth'], function() {
    //                 Route::get('/home', HomeController::class,'index')->name('home');
    //                 Route::get('/plans', PlanController::class,'index')->name('plans.index');
    //                 Route::get('/plan/{plan}', PlanController::class,'show')->name('plans.show');
    //             });
    //         }); 
      



    //order module
    Route::group(['prefix' => 'orders'], function () {
        Route::get('/index',[OrderController::class,'index'] )->name('admin.orders.index');
        Route::get('/{order}/show', [OrderController::class,'show'])->name('admin.orders.show');
        route::get('send',[HomeController::class,'sendNotification']);
    });
        