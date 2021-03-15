<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    function login(){
        return view('login.index');
    }

    function check(Request $request){
        //Validate requests
        $request->validate([
            'email' => 'required | min:10 | max:50 | email',
            'password' => 'required | min:8 | max:20 | alpha_num',
            
        ]);

        $userInfo = user::where('email','=', $request->email)->first();

        if(!$userInfo){
            return back()->with('fail','We do not recognize your email address');
        }else{
            //check password
            if(Hash::check($request->password, $userInfo->password))
            {
               if($userInfo->type == 'user'){
                    $request->session()->put('LoggedUser', $userInfo->id);
                    return redirect('user/dashboard');
                }
                elseif($userInfo->type == 'admin'){
                    $request->session()->put('LoggedUser', $userInfo->id);
                    return redirect('admin/dashboard');
                }
                elseif($userInfo->type == 'account'){
                    $request->session()->put('LoggedUser', $userInfo->id);
                    return redirect('account/dashboard');
                }
                elseif($userInfo->type == 'employee'){
                    $request->session()->put('LoggedUser', $userInfo->id);
                    return redirect('employee/dashboard');
                }

            }
            else{
                return back()->with('fail','Incorrect password');
            }
        }
    }
}
