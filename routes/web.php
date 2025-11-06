<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::middleware(['auth', 'role:user'])->group(function () {
Route::get("/", [HomeController::class, "index"])->name('home');
Route::get('/article/{article}', [HomeController::class, "show"])->name('show.article');
});


Route::middleware(['auth', 'role:admin'])->group(function() {

    Route::resource("articles", ArticleController::class);
    Route::resource("cats", CatController::class);
});



Route::view('/register', 'auth.register')->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

Route::view('/login', 'auth.login')->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('home');
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ]);
})->name('login.post');

Route::post('/logout', function () {
    Auth::logout();                           
    request()->session()->invalidate();      
    request()->session()->regenerateToken();  
    return redirect('/');                    
})->name('logout');