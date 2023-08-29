<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\UserController;

class UserController extends Controller
{
    public function create(){
        return view('users.register');
    }

    public function store(Request $request){

        $formFields= $request->validate([
            'name'=>['required','min:3'],
            'email'=>['required','email',Rule::unique('users','email')],
            'password'=> 'required|confirmed|min:5'   
        ]);

        // hasing password
        $formFields['password']=bcrypt($formFields['password']);
        
        // newuser creation
        $user=User::create($formFields);
        
        // logging in new user
        auth()->login($user);

        return redirect('/')->with('message','User Created and logged in');
    }

    // logout
    public function logout(Request $request){

       
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message','You have been Logged Out!');
    }

    // show log in form function
    public function login(){
        return view('users.login');

    }

    public function authenticate(Request $request){
        $formFields=$request->validate([
            'email'=>['required','email'],
            'password'=>'required'
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();

            return redirect('/')->with('message','you are now logged in!');
        }
        return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');
    }
}
