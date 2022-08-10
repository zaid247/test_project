<?php

use Illuminate\Support\Facades\Route;
use App\http\controllers\Backend\ComController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

    Route :: get('/add_companies',[ComController::class ,'create']); 
    Route :: post('/add_companies/store',[ComController::class ,'store'])->name('company.store');
    Route :: get('/Companies',[ComController::class ,'index'])->name('company.index');
    Route :: get('/Companies/edit/{id}',[ComController::class ,'edit'])->name('company.edit');
    Route :: post('/Companies/update/{id}',[ComController::class ,'update'])->name('company.update');
    Route :: get('/Companies/destroy/{id}',[ComController::class ,'destroy'])->name('company.destroy');