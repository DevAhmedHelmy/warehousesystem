<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('admin.index');
// });

Auth::routes();

Route::get('/', 'Admin\Home\HomeController@index')->name('home');


Route::group(['middleware' => ['auth','role:Admin']], function() {
    Route::resource('roles','Admin\Role\RoleController');
    Route::resource('users','Admin\User\UserController');
    Route::resource('companies','Admin\Company\CompanyController');
    // Route::get('companies/search','Admin\Company\CompanyController');
    Route::resource('categories','Admin\Category\CategoryController');
    Route::resource('branches','Admin\Branch\BranchController');
    Route::resource('units','Admin\Unit\UnitController');
    
    Route::resource('products','Admin\Product\ProductController');
    
    Route::resource('clients','Admin\Client\ClientController');
    Route::resource('clients_account','Admin\Client\ClientAccountController');
    Route::resource('suppliers','Admin\Supplier\SupplierController');
    Route::resource('salebills','Admin\SaleBill\SaleBillController');
    Route::resource('purchasebills','Admin\PurchaseBill\PurchaseBillController');
    Route::get('stocks/{stock_id}/product/transactions/{product_id}','Admin\Stock\StockController@transaction');
    Route::resource('stocks','Admin\Stock\StockController');
});

