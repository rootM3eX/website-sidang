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

// Route::get('create-admin',function(){
//     \DB::table('users')->insert([
//         'name'=>'admin',
//         'email'=>'admin@web.com',
//         'role'=>1,
//         'password'=>bcrypt('admin123')
//     ]);
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'], function(){
    Route::get('logout',function(){
        \Auth::logout();
        return redirect('/');
    });

    Route::get('input-data','Dashboard\Sidang_controller@index');
    Route::post('add-data-sidang','Dashboard\Sidang_controller@store');
    Route::get('all-data','Dashboard\Sidang_controller@show');

    Route::get('sidang/hapus/{id}','Dashboard\Sidang_controller@delete');
    Route::get('sidang/edit/{id}','Dashboard\Sidang_controller@edit');
    Route::put('update-data-sidang/{id}','Dashboard\Sidang_controller@update');
});
