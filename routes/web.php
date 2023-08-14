<?php

use Illuminate\Support\Facades\Route;
use App\models\Listing;

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
// All listings
Route::get('/', function () {
    return view('welcome', [
        'heading' => 'Lastest Listings',
        'listings' => Listing::all()

    ]);
});
// single listings
Route::get('/listings/{listing}', function (Listing $listing) {
    return view('listing', [
        'listing' =>$listing
    ]);
});
