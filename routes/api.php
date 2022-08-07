<?php

use App\Http\Controllers\{StoreController,Users,ProductController};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::resource('store', StoreController::class);
Route::resource('user', Users::class);
Route::resource('getallproduct', ProductController::class);
Route::post('userlogin', [Users::class,'login']);
Route::post('sampllogin',function(Request $req)
{
    return $req;
});
