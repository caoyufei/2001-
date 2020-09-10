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
});

Route::get('login/login',"Login\LoginController@login");
Route::post('login/loginDo',"Login\LoginController@loginDo");

Route::get('login/new',"Login\LoginController@new");
Route::post('login/add',"Login\LoginController@add");


//商品品牌的增删改查
Route::get('/brand',"Admin\BrandController@index")->name('brand');
Route::get('/brand/create',"Admin\BrandController@create")->name('brand.create');
Route::post('/brand/store',"Admin\BrandController@store");
Route::post('/brand/upload',"Admin\BrandController@upload");
Route::get('/brand/edit/{brand_id}',"Admin\BrandController@edit");
Route::any('/brand/update/{brand_id}',"Admin\BrandController@update");
Route::any('/brand/destroy/{brand_id?}',"Admin\BrandController@destroy");
Route::get('/brand/change',"Admin\BrandController@change");

