<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipesController;

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

Route::get("/recipes", [RecipesController::class, "index"]);
Route::post("/recipes", [RecipesController::class, "store"]);
Route::delete("/recipes/delete", [RecipesController::class, "destory"]);
Route::put("/recipes/update", [RecipesController::class, "update"]);
Route::get("/recipes/{id}", [RecipesController::class , "getOne"]);
