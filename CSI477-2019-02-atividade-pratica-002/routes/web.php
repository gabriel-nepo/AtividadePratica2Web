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

// Route::group(['middleware' => 'isAdmin'], function () {
//     Route::get('admin', 'adminController@adminDashboard');
// });

use App\Http\Controllers\UserProtocols;
use App\Http\Controllers\AdminController;

use App\Models\subjects;

Route::get('/', function () {
    $subjects = Subjects::orderBy('name')->get();
    return view('welcome',compact('subjects'));
});

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::group(['middleware' => ['auth']],function(){
    
    Route::group(['middleware' => ['admin']], function(){
        Route::get('/admin', 'AdminController@viewProtocols');
        Route::get('/admin/protocols/create','AdminController@createProtocol');
        Route::resource('protocols', 'AdminController', ['except' => ['show']]);
    });

    Route::get('/home/protocols','UserProtocols@viewRequests');
    Route::post('home/create-request/send','UserProtocols@store');
    Route::get('home/create-request','UserProtocols@createRequests');

    Route::resource('requests', 'UserProtocols', ['except' => ['show']]);
});