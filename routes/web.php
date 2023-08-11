<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('search', 'App\Http\Controllers\ProjectController@search')->name('project.search');
Route::post('search', 'App\Http\Controllers\ProjectController@handleSearch')->name('project.handleSearch');
Route::get('/order-detail/{id}', 'App\Http\Controllers\ProjectController@showOrderDetail')->name('order.detail');
Route::delete('/project/delete/{id}', 'App\Http\Controllers\ProjectController@delete')->name('project.delete');
