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

// fallback route
Route::get('/{any?}', function () {
    return view('welcome');
    // (?!regex) 否定先読み
})->where('any', '^(?!api\/)[\/\w\.-]*');
