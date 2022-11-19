<?php

use App\Http\Controllers\{
    AuthController,
    ImageController,
    PavilionController,
    UserController,
    PostController,
    TicketController
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\{
    User,
    Post
};

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

Route::post("/login",[AuthController::class, "login"])->name('login');

//Generating users
Route::get("/generate/users", function() {
    return User::factory(20)->create();
});

Route::get("generate/posts", function() {
    return Post::factory(20)->create();
});

Route::group(['middleware' => ['auth:sanctum', 'cors']], function() {
    Route::resource("/user",UserController::class)->except(["create", "index", "edit"]);
    Route::get("/showLoggedUser", [UserController::class, "showLoggedUser"]);
    Route::resource("/post", PostController::class)->except(["create", "edit"]);
    Route::resource("/ticket", TicketController::class)->except(["create", "edit"]);
    Route::post("/ticket/response/{id}", [TicketController::class, "ticketResponse"]);
    Route::put("/user/{id}/changePassword", [UserController::class, "changePassword"]);
    Route::resource("/pavilion", PavilionController::class)->only(["index", "store", "show", "destroy"]);
    Route::post("/logout", [AuthController::class, "logOut"]);
    Route::post("/upload", [ImageController::class, "upload"]);
    Route::get("/image", [ImageController::class, "show"]);
});