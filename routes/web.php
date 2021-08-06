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

Route::get('/', function () {
    return redirect(route('login'));
});



Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::get('profile-dispatcher/{id}', ['as' => 'profile.edit2', 'uses' => 'App\Http\Controllers\ProfileController@showDis']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::put('profile/{id}', ['as' => 'profile.update-d', 'uses' => 'App\Http\Controllers\ProfileController@updateD']);


    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

    // Admin routes
    Route::get('admins-system', 'App\Http\Controllers\AdminController@listAdmins')->name('admins');
    Route::post('admins-system', 'App\Http\Controllers\AdminController@createAdmin')->name('createAdmin');
    Route::delete('delete-admin/{id}', 'App\Http\Controllers\AdminController@destroyAdmin')->name('del');
    Route::get('suspend-admins-system/{id}', 'App\Http\Controllers\AdminController@suspendAdmin')->name('sus');
    Route::get('unsuspend-admin/{id}', 'App\Http\Controllers\AdminController@unsuspendAdmin')->name('unsus');

    // Item routes
    Route::post('add-new-item', 'App\Http\Controllers\ItemController@store')->name('addItem');
    Route::put('pudates-item/{id}', 'App\Http\Controllers\ItemController@update')->name('updateItem');
    Route::put('pudates-item-status/{id}', 'App\Http\Controllers\ItemController@changeStatus')->name('itemStatus');
    Route::get('display-item/{id}', 'App\Http\Controllers\ItemController@show')->name('displayItem');
    Route::get('get-all-items', 'App\Http\Controllers\ItemController@index')->name('allItems');
    Route::delete('delete-item/{id}', 'App\Http\Controllers\ItemController@desItem')->name('destroyItem');
    //  Dispatcher Route
    Route::delete('delete-patcher-dis/{id}', 'App\Http\Controllers\DispatcherController@destroyDis')->name('destroyDis');
    Route::post('store-patcher-dis', 'App\Http\Controllers\DispatcherController@store')->name('storeDis');
    Route::put('update-patcher-dis/{id}', 'App\Http\Controllers\DispatcherController@update')->name('updateDis');
    Route::get('all-patcher-dis', 'App\Http\Controllers\DispatcherController@index')->name('allDis');
    Route::get('this-patcher-dis/{id}', 'App\Http\Controllers\DispatcherController@show')->name('showDis');
    // assign Item to Dispatcher
    Route::get('assign-item-todispatcher', 'App\Http\Controllers\ItemController@assignDispatcher')->name('assDis');
    Route::post('assign-item-todispatcher', 'App\Http\Controllers\ItemController@addItemToQueue')->name('assign');
    // filter Items
    Route::post('filter-items', 'App\Http\Controllers\ItemController@filterItems')->name('filtItems');
    // Dispatched Items
    Route::get('dispatcher-item/{id}', 'App\Http\Controllers\DispatcherController@dispatched')->name('dispatched');

});