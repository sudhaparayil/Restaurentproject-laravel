<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/",[HomeController::class,'index']);
Route::get("/redirects",[HomeController::class,'reDirect']);
Route::get("/users",[AdminController::class,'allUser']);
Route::get("/foodmenu",[AdminController::class,'foodMenu']);
Route::post("/uploadfood",[AdminController::class,'uploadFood']);
Route::get("deleteuser/{id}",[AdminController::class,'deleteUser']);
Route::get("deletemenu/{id}",[AdminController::class,'deleteMenu']);
Route::get("updateview/{id}",[AdminController::class,'updateView']);
Route::post("updatefood/{id}",[AdminController::class,'updateFood']);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/convert-to-json', function () {
    return App\Models\User::paginate(5);
});