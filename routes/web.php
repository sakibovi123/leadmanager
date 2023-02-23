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
Route::get("/create-campaign-template", [\App\Http\Controllers\CampaignController::class, "create_campaign"])->name("create-campaign");
Route::post("/store-campaign", [\App\Http\Controllers\CampaignController::class, "store"])->name("store-campaign");
Route::delete("/delete-campaign/{id}", [\App\Http\Controllers\CampaignController::class, "remove"])->name("remove-campaign");
Route::get("/campaign-details/{campaign_uid}", [\App\Http\Controllers\CampaignController::class, 'details'])->name("campaign-details");
Route::post("/add-field-to-campaign/{campaign_uid}", [\App\Http\Controllers\CampaignController::class, "add_fields_to_campaigns"])->name("add_fields");
Route::delete("/delete-field", [\App\Http\Controllers\CampaignController::class, "remove_field"]);
// client urls
Route::get("/clients", [\App\Http\Controllers\ClientController::class, "index"])->name("clients");
Route::get("/create-clients", [\App\Http\Controllers\ClientController::class, "create"])->name("create-client");
Route::post("/save-client", [\App\Http\Controllers\ClientController::class, "save"])->name("save-client");
Route::get("/edit-client/{client_id}", [\App\Http\Controllers\ClientController::class, "edit"])->name("edit-client");
Route::put("/update-client/{client_id}", [\App\Http\Controllers\ClientController::class, "update"])->name("update-client");
Route::delete("/delete-client/{client_id}", [\App\Http\Controllers\ClientController::class, "remove"])->name("remove-client");

// leads routes
Route::get("/leads", [\App\Http\Controllers\LeadController::class, 'leads'])->name("leads");

// Camp lejeunes leads lists
Route::get("/camp-leads", [\App\Http\Controllers\CampLejuneController::class, "index"])->name("camplejeune");
Route::post("/create-camp-lead", [\App\Http\Controllers\CampLejuneController::class, "post"])->name("post-camplejeune");
Route::get("/edit-camp/{id}", [\App\Http\Controllers\CampLejuneController::class, "edit"])->name("edit-camp-lejeune");
Route::put("/update-camp-lejeune/{id}", [\App\Http\Controllers\CampLejuneController::class, "update"])->name("update-camp-lejeune");
Route::delete("/delete-camp-lejeune/{id}", [\App\Http\Controllers\CampLejuneController::class, "remove"])->name("delete-camp-lead");

// test lead routes
Route::get("/test-lead/{campaign_id}", [\App\Http\Controllers\TestLeadController::class, "index"]);
Route::post("/send-test-lead/{campaign_id}", [\App\Http\Controllers\TestLeadController::class, "send_test_lead"]);


// Leads routes
Route::get("/leads", [\App\Http\Controllers\LeadController::class, "leads"]);
