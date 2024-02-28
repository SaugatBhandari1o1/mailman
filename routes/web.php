<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\user\RegisterController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\FormController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and will be assigned to
| the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/registration', function(){
//     return view('user.registration');
// })->middleware(['auth','verified'])->name('registration');


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware(['auth', 'verified'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/home', function () {
//         return view('home');
//     })->name('home');

//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/home', function () {
//         return view('home');
//     })->name('home');


Route::get('/home', function () {
    return view('home');
})->name('home');


Route::group(['middleware'=>'admin_auth'], function(){
    Route::get('/admin',[AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/forms',[FormController::class, 'index'])->name('form');
    Route::post('/admin/forms',[FormController::class, 'createCity'])->name('city.create');
    Route::post('/admin/update', [FormController::class, 'provinceUpdate'])->name('province.update');
    Route::post('/admin/store', [FormController::class, 'store'])->name('province.add');
    Route::post('/admin/city.update',[FormController::class,'updateCity'])->name('city.update');
});



Route::middleware(['auth'])->group(function () {
    Route::get('/registration', [RegisterController::class, 'index'])->name('index');
    Route::post('/city', [RegisterController::class, 'getCities'])->name('city');



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/upload', [RegisterController::class, 'register'])->name('user.register');
});



Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('/auth/login');
    });
});

require __DIR__ . '/auth.php';
