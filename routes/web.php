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
    return view('auth.login');
})->middleware('guest');
// Route::get('adminlte', function () {
//     return view('template.app');
// });
// Route::get('dashboard', function () {
//     return view('admin.dashboard');
// });

Auth::routes(['register'=>false]);// non aktif register

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>['auth']],function(){
    Route::get('users', 'Web\UsersController@index')->name('data.users');

    Route::get('product/create', 'Web\ProductsController@create')->name('product.create');

});


