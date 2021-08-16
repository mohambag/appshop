<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\back\UserController;


//************************* Logout ***********************************
Route::get('/logout','Auth\LoginController@logout');

//*********************back Auth***********************

Auth::routes();


//*************************Front Route********************************

//*************************Index Route********************************
  Route::get('/',function (){
      return view('welcome');
  });


//************************Front Products****************************

Route::prefix('/products')->group(function (){
    Route::get('/','front\ProductController@index')->name('products');
    Route::get('/show/{product}','front\ProductController@show')->name('show.product');
});


//************************Front Category Products****************************

Route::prefix('/product')->group(function (){
    Route::get('/show/{category}','front\ProductController@showCategory')->name('show.category.product');
});



////*************************Back Route********************************

Route::get('/admin',function (){
    return view('back.index');
});

//********************************Back * Category************************

Route::prefix('admin/categories')->group(function (){
    Route::get('/','back\CategoryController@index')->name('admin.categories');
    Route::get('/create','back\CategoryController@create')->name('admin.categories.create');
    Route::post('/store','back\CategoryController@store')->name('admin.categories.store');
    Route::get('/edit/{category}','back\CategoryController@edit')->name('admin.categories.edit');
    Route::post('/update/{category}','back\CategoryController@update')->name('admin.categories.update');
    Route::get('/destroy/{category}','back\CategoryController@destroy')->name('admin.categories.destroy');
    Route::get('/destroyAll','back\CategoryController@destroyAll')->name('admin.categories.destroyAll');
});



//************************************back * Users*******************
Route::prefix('/admin')->group(function (){
    Route::get('/users','back\UserController@index')->name('admin.users');
    Route::get('/users/profiles/{user}','back\UserController@edit')->name('admin.users.profile');
    Route::post('/users/update/{user}','back\UserController@update')->name('admin.users.update');
    Route::get('/updatestatus/{user}','back\UserController@updatestatus')->name('admin.users.updatestatus');
    Route::get('/destroy/{user}','back\UserController@destroy')->name('admin.users.destroy');
});



//**********************************back product*************************


Route::prefix('/admin/products')->group(function (){
    Route::get('/','back\ProductController@index')->name('admin.products');
    Route::get('/create','back\ProductController@create')->name('admin.products.create');
    Route::post('/store','back\ProductController@store')->name('admin.products.store');
    Route::get('/edit/{product}','back\ProductController@edit')->name('admin.products.edit');
    Route::post('/update/{product}','back\ProductController@update')->name('admin.products.update');
    Route::get('/destroy/{product}','back\ProductController@destroy')->name('admin.products.destroy');
    Route::post('/destroyAll','back\ProductController@destroyAll')->name('admin.products.destroyAll');
    Route::get('/updatestatus/{product}','back\ProductController@updatestatus')->name('admin.products.updatestatus');
    Route::get('/updatespecial/{product}','back\ProductController@updatespecial')->name('admin.products.updatespecial');
});







//***********************************************************************

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
