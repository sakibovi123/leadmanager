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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get("/", [\App\Http\Controllers\ViewController::class, "index"]);
Route::get("/get-data", [\App\Http\Controllers\FormController::class, "get_form_data"]);
Route::post("/post", [\App\Http\Controllers\FormController::class, "post_json"]);
