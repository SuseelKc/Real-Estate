<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\ListingController;

class ListingController extends Controller
{
    //all listings
public function index(){
    return view('listings.index', [
        'listings' => Listing::latest()->filter(request(['tag','search']))->paginate(6)
    ]);
}
 // single listings
 public function show(Listing $listing){
    return view('listings.show', [
        'listing' =>$listing
    ]);
    } 
//   crate form method/function which shows create form
  public function create(){
    
        return view('listings.create');
    }

// store listing data
    public function store(Request $request){
        // dd($request->all());
        
       
        $formFields=$request->validate([
            
            'title'=>'required',
            'property'=> ['required',Rule::unique('listings','property')],
            'location'=>'required',
            'website'=>'required',
            'email'=>['required','email'],
            'tags'=> 'required',
            'description'=> 'required'
        ]);
        // if the photo pf land has been uploaded then
        if($request->hasFile('photo')){
            $formFields['photo']=$request->file('photo')->store('photos','public');

        }

        Listing::create($formFields);
        
        return redirect('/')->with('message','Listing Posted sucessfully!');
    }
}
