<?php

use App\models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

// common resource routes:
// index -show all listings
// show -show single listings
// create - show form to create new listings
// store- store new listings
// edit - show form to edit listing
// update -update listings
// destroy - delete listing


// All listings
Route::get('/', [ListingController::class,'index']);


// show create form
Route::get('/listings/create',[ListingController::class,'create'])->middleware('auth');


// store listings data
Route::post('/listings', [ListingController::class, 'store'] )->middleware('auth');


//show edit form
Route::get('listings/{listing}/edit',[ListingController::class,'edit'])->middleware('auth');

// edit submit to update
Route::put('/listings/{listing}',[ListingController::class,'update'])->middleware('auth');

// edit submit to update
// Route::put('/listings/{listing}',[ListingController::class,'update']);

// delete
Route::delete('/listings/{listing}',[ListingController::class,'destroy'])->middleware('auth');

// single listings
Route::get('/listings/{listing}', [ListingController::class, 'show'] )->middleware('auth');

// register
Route::get('/register',[UserController::class,'create']);

// create new user
Route::post('/users',[UserController::class,'store'])->middleware('auth');

// logout users
Route::post('/logout',[UserController::class,'logout'])->middleware('auth');

// login
Route::get('/login',[UserController::class,'login'])->name('login');

// 
Route::post('/users/authenticate',[UserController::class,'authenticate']);
