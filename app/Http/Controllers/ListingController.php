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

        $formFields['user_id']=auth()->id();

        Listing::create($formFields);
        
        return redirect('/')->with('message','Listing Posted sucessfully!');
    }

    // edit
    public function edit(Listing $listing){
        // dd($listing);
        return view('listings.edit',['listing'=>$listing]);
    }

    // update
    public function update(Request $request,Listing $listing){
        // dd($request->all());
        
       
        $formFields=$request->validate([
            
            'title'=>'required',
            'property'=> ['required'],
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

        $listing->update($formFields);
        
        return back()->with('message','Listing Updated sucessfully!');
    }

    public function destroy(Listing $listing){
        $listing->delete();
        return redirect('/')->with('message',"Listing Deleted sucessfully!");

    }

    // manage
    public function manage(){

        return view('listings.manage',['listings'=>auth()->user()->listings()->get()]);
    }
    
}
