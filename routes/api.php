<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::get("/data", [\App\Http\Controllers\LeadController::class, "get_form_data"]);
Route::post("/post", [\App\Http\Controllers\LeadController::class, "post_json"]);

Route::post("/create", [\App\Http\Controllers\LeadController::class, "post_parameter_wise"]);

// camplejune post url
Route::post("/post-legal", [\App\Http\Controllers\CampLejuneController::class, "post"]);
//Route::post("/post/?lp_camapaign_id={lp_campaign_id}&lp_campaign_key={lp_campaign_key}&first_name{first_name}&last_name={last_name}&phone={phone}&email={email}&zip_code={zip_code}");


// mva exchange api post url
Route::post("/post-mva", [\App\Http\Controllers\Leads\MVAExchangeController::class, "send_data"]);

// ERC API
Route::post("/post-erc", [\App\Http\Controllers\Leads\ERCController::class, "send_data_to_erc"]);
