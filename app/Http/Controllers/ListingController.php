<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    //all listings
public function index(){
    return view('listings.index', [
        'listings' => Listing::all()]);
}
 // single listings
 public function show(Listing $listing){
    return view('listings.show', [
        'listing' =>$listing
    ]);
    }
   
}