<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    

    function register(){
        return view('reg.register');
    }

    function save(Request $request){
        
        //Validate requests
        $request->validate([
            'fullname' => 'required | min:3 | max:30 ',
            'username' => 'required | min:3 | max:20',
            'email' => 'required | min:10 | max:50 | email | unique:users',
            'password' => 'required | min:8 | max:20 | alpha_num',
            'cpassword' => 'required | same:password',
           // 'address' => 'required',
            //'company' => 'required | min:3 | max:20',
            'number' => 'required|digits:11',
            //'city' => 'required | min:3 | max:20',
           // 'country' => 'required | min:3 | max:20',

        ]);

                 //Insert data into database
                 $user = new user;
                 $user->fullname = $request->fullname;
                 $user->username = $request->username;
                 $user->email = $request->email;
                 $user->password = Hash::make($request->password);
              //   $user->address = $request->address;
             //    $user->company = $request->company;
                 $user->number = $request->number;
                // $user->city = $request->city;
               //  $user->country = $request->country;
                 $user->type = 'user';
                 $save = $user->save();

                 if($save){
                    return redirect('/login')->with('success','Registration Succesfull');

                 }else{
                     return back()->with('fail','Something went wrong, try again later');
                 }
    }
    
    public function delete($id){

        $user = User::find($id);
        return view('admin.Dashboard.delete')->with('user', $user);
    }

    public function destroy($id){

        if(User::destroy($id)){
            return redirect('/home/userlist');
        }else{
            return redirect('/home/delete/'.$id);
        }

    }
 //end of main   
}
