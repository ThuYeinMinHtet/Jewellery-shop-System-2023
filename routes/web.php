<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[
HomeController::class,
'index'
]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


route::get('/redirect',[
HomeController::class,
'redirect'
]);


//Admin Route

/*
  Category Route
*/

route::get('/view_category',[
AdminController::class,
'view_category'
]);

route::post('/add_category',[
AdminController::class,
'add_category'
]);

route::get('/category/delete/{id}',[
AdminController::class,
'delete_category'
]);

/*
  Product Route
*/
route::get('/addnewproduct',[
AdminController::class,
'AddNewProducts'
]);

route::post('add_product',[
AdminController::class,
'Add_Product'
]);

route::get('showproducts',[
AdminController::class,
'ShowProduct'
]);

route::get('product/delete/{id}',[
AdminController::class,
'DeleteProduct'
]);

route::get('product/edit/{id}',[
AdminController::class,
'EditProduct'
]);

route::post('update_product/{id}',[
AdminController::class,
'UpdateProduct'
]);

route::get('order',[
AdminController::class,
'Order'
]);

route::get('delivered/{id}',[
AdminController::class,
'Delivered'
]);

route::get('print/pdf/{id}',[
AdminController::class,
'PrintPDF'
]);
   //end admin route
   /*
     User Route
   */
route::get('product/detail/{id}',[
HomeController::class,
'DetailProduct'
]);

route::post('add_cart/{id}',[
HomeController::class,
'AddCart'
]);

route::get('showCart',[
HomeController::class,
'ShowCart'
]);

route::get('cart/remove/{id}',[
HomeController::class,
'RemoveCart'
]);

route::get('cash_order',[
HomeController::class,
'CashOrder'
]);

route::get('stripPay/{totalprice}',[
 HomeController::class,
 'StripePay'
]);

route::post('stripe/{totalprice}',[
HomeController::class,
'stripePost'])->name('stripe.post');