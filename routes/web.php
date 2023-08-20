<?php

use App\models\Listing;
use Illuminate\Support\Facades\Route;
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
Route::get('/listings/create',[ListingController::class,'create']);


// store listings data
Route::post('/listings', [ListingController::class, 'store'] );


// single listings
Route::get('/listings/{listing}', [ListingController::class, 'show'] );


