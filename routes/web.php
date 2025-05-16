<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CompanyController;

use App\Services\Data;

Route::get('/', function () {
return view('welcome');
});
//Route::get('/contacts', [ContactController::class,'index']);
Route::resource('contacts', ContactController::class);
Route::resource('companies', CompanyController::class);