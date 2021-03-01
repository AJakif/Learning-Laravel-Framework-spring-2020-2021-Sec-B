<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    function login(){
        return view('auth.login');
    }

    function register(){
        return view('auth.register');
    }

    function save(Request $request){
        
        //Validate requests
        $request->validate([
            'fullname' => 'required | min:3 | max:30 ',
            'username' => 'required | min:3 | max:20',
            'email' => 'required | min:10 | max:50 | email | unique:users',
            'password' => 'required | min:8 | max:20 | alpha_num',
            'cpassword' => 'required | same:password',
            'address' => 'required',
            'company' => 'required | min:3 | max:20',
            'number' => 'required|digits:11',
            'city' => 'required | min:3 | max:20',
            'country' => 'required | min:3 | max:20',

        ]);

                 //Insert data into database
                 $user = new user;
                 $user->fullname = $request->fullname;
                 $user->username = $request->username;
                 $user->email = $request->email;
                 $user->password = Hash::make($request->password);
                 $user->address = $request->address;
                 $user->company = $request->company;
                 $user->number = $request->number;
                 $user->city = $request->city;
                 $user->country = $request->country;
                 $user->type = 'user';
                 $save = $user->save();

                 if($save){
                    return redirect('/auth/login')->with('success','Registration Succesfull');

                 }else{
                     return back()->with('fail','Something went wrong, try again later');
                 }
    }
   
    function check(Request $request){
        //Validate requests
        $request->validate([
            'email' => 'required | min:10 | max:50 | email',
            'password' => 'required | min:8 | max:20 | alpha_num'
        ]);

        $userInfo = user::where('email','=', $request->email)->first();

        if(!$userInfo){
            return back()->with('fail','We do not recognize your email address');
        }else{
            //check password
            if(Hash::check($request->password, $userInfo->password)){
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('user/dashboard');

            }
            else{
                return back()->with('fail','Incorrect password');
            }
        }
    }

    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/auth/login');
        }
    }

    function dashboard(){
        $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
        return view('user.dashboard', $data);
    }
    function settings(){
        $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
        return view('user.settings', $data);
    }

    function profile(){
        $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
        return view('user.profile', $data);
    }
    
}
