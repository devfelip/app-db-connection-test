<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainModelController;
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
//Route::get('/', ['as'=>'admin.help.index','uses'=>'App\Http\Controllers\HelpController@index']);
//Route::get('/', ['as'=>'admin.help.index',HelpController::class, 'index']);
Route::get('/', [MainModelController::class, 'index'])->name('index');
Route::get('/select_tables/{conn}/{host}/{port}/{db}/{user}/{pass}/{schema}', [MainModelController::class, 'populate_select_tables'])->name('select');
Route::get('/select_schemas/{conn}/{host}/{port}/{db}/{user}/{pass}', [MainModelController::class, 'populate_select_schemas'])->name('select2');
