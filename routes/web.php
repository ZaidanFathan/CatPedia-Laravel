<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get("/", [HomeController::class, "index"]);


// Route::get("/articles", [ArticleController::class, "index"]);
// Route::get("/cats", [CatController::class, "index"]);
Route::get("/dashboard", [DashboardController::class, "index"]);

Route::resource("articles", ArticleController::class);
Route::resource("cats", CatController::class);