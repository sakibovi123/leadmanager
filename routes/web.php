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

// Campaigns Routes
Route::get("/campaigns", [\App\Http\Controllers\CampaignController::class, "index"])->name("campaigns");
Route::post("/create-campaign", [\App\Http\Controllers\CampaignController::class, "store"])->name("create-campaign");
Route::delete("/delete-campaign/{id}/", [\App\Http\Controllers\CampaignController::class, "remove"])->name("remove-campaign");

// leads routes
Route::get("/leads", [\App\Http\Controllers\LeadController::class, 'leads'])->name("leads");

