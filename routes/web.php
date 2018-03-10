<?php

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

 Route::get('/', function () {
    return view('welcome');
   return view('admin/index');
});

// Route::get('contact', 'contactController@index');
// Route::post('contact', 'contactController@contact');


Auth::routes();
Route::middleware(['auth'])->prefix('admin')->  group(function () {
  Route::get('/', function () {
     return view('admin/index');
  });
         Route::get('companys', 'companyController@index');
         Route::get('company/create', 'companyController@create');
         Route::post('company/create', 'companyController@store');
         Route::get('company/edit/{id}', 'companyController@edit');
         Route::post('company/edit/{id}', 'companyController@update');
         Route::get('company/delete/{id}', 'companyController@delete');
         Route::get('/company/{id}', 'companyController@products');
          Route::get('company/theme', 'companyController@create');
          Route::post('company/theme', 'companyController@store');

        Route::get('categorys', 'categorysController@index');
        Route::get('category/DataTable', 'categorysController@datatable');

        Route::get('category/create', 'categorysController@create');
        Route::post('category/create', 'categorysController@store');
        Route::get('category/edit/{id}', 'categorysController@edit');
        Route::post('category/edit/{id}', 'categorysController@update');
        Route::get('category/delete/{id}', 'categorysController@delete');
        Route::post('category/deleteall', 'categorysController@deleteall');


        Route::get('/category/{id}', 'CategoryController@products');

        Route::get('products', 'productsController@index');
        Route::get('product/DataTable', 'productsController@datatable');

        Route::get('product/create', 'productsController@create');
        Route::post('product/create', 'productsController@store');
        Route::get('product/edit/{id}', 'productsController@edit');
        Route::post('product/edit/{id}', 'productsController@update');
        Route::get('product/delete/{id}', 'productsController@delete');
        Route::post('product/deleteall', 'productsController@deleteall');
        Route::get('product/delete/{id}/{product_id}', 'productsController@imagedelete');

        Route::get('contact', 'contactController@index');
        Route::post('contact', 'contactController@store');

        Route::get('setting', 'settingController@index');
        Route::post('setting', 'settingController@acc');

        Route::get('profile', 'profileController@index');
        Route::get('profile_edit/reset', 'resetController@index');
        Route::post('profile_edit/reset', 'resetController@update');

   });
