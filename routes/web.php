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

Route::get('/load-leads', [\App\Http\Controllers\MainController::class, 'loadLeadsAndEntitiesToDb']);
Route::get('/show-leads', [\App\Http\Controllers\MainController::class, 'showLeads']);
