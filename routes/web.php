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
Route::delete("/delete-campaign/{id}", [\App\Http\Controllers\CampaignController::class, "remove"])->name("remove-campaign");
Route::get("/campaign-details/{id}", [\App\Http\Controllers\CampaignController::class, 'details'])->name("campaign-details");

// client urls
Route::get("/clients", [\App\Http\Controllers\ClientController::class, "index"])->name("clients");
Route::get("/create-clients", [\App\Http\Controllers\ClientController::class, "create"])->name("create-client");
Route::post("/save-client", [\App\Http\Controllers\ClientController::class, "save"])->name("save-client");
Route::get("/edit-client/{client_id}", [\App\Http\Controllers\ClientController::class, "edit"])->name("edit-client");
Route::put("/update-client/{client_id}", [\App\Http\Controllers\ClientController::class, "update"])->name("update-client");
Route::delete("/delete-client/{client_id}", [\App\Http\Controllers\ClientController::class, "remove"])->name("remove-client");

// leads routes
Route::get("/leads", [\App\Http\Controllers\LeadController::class, 'leads'])->name("leads");

