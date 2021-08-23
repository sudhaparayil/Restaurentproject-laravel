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
Route::get("deleteuser/{id}",[AdminController::class,'deleteUser']);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/convert-to-json', function () {
    return App\Models\User::paginate(5);
});