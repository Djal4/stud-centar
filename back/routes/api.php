<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TicketController;
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

Route::post("/login",[AuthController::class,"login"])->name('login');

//Generating users
Route::get("/generate/users",function(){
    return User::factory(20)->create();
});

Route::group(['middleware'=>['auth:sanctum','cors']],function(){
    Route::resource("/user",UserController::class)->except(["create","index","edit"]);
    Route::resource("/post",PostController::class)->except(["create","edit"]);
    Route::resource("/ticket",TicketController::class)->except(["create","edit"]);
    Route::post("/ticket/response/{id}",[TicketController::class,"ticketResponse"]);
    Route::put("/user/{id}/changePassword",[UserController::class,"changePassword"]);
    Route::post("/logout",[AuthController::class,"logOut"]);
});