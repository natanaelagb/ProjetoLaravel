<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

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

Route::get('/',[EventController::class, "index"]);

Route::get('/eventos/criar',[EventController::class, "create"])->middleware("auth");

Route::get('/eventos/{id}',[EventController::class, "show"]);

Route::post("/eventos", [EventController::class, "store"]);

Route::delete("/eventos/{id}", [EventController::class, "destroy"]);

Route::get("/painel", [EventController::class, "dashboard"])->middleware("auth");
