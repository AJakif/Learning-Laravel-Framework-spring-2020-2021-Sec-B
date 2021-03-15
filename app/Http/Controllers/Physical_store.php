<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Physical_store;
use App\Models\Social_media;
use App\Models\Ecommerce;
use App\Models\User;
use Validator;
use App\Http\Requests\PhysicalRequest;
use Carbon\Carbon;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class Physical_Store_Controller extends Controller
{
    public function index( Request $req){

        $name = "akif";
        $id = "123";

        //return view('home.index', ['name'=> 'xyz', 'id'=>12]);
        // return view('home.index')
        //         ->with('name', 'Nafi')
        //         ->with('id', '12');

        // return view('home.index')
        //         ->withName($name)
        //         ->withId($id);

        return view('system.physicalStore', compact('id', 'name'));

    }

    public function edit($id){

        $user = User::find($id);
        return view('home.edit')->with('user', $user);
    }


    public function update($id, Request $req){

        $user = User::find($id);

            $user->full_name     = $req->full_name;
            $user->username     = $req->username;
            $user->email         = $req->email;
            $user->password      = $req->password;
            $user->country       = $req->country;
            $user->phone         = $req->phone;
            $user->city          = $req->city;
            $user->company_name = $req->company_name;
            $user->user_type = $req->user_type;
            $user->date_added = $req->date_added;
            $user->save();


        return redirect('/home/userlist');
    }

    public function physicalStorelist(){

        $sevensoldlist = Physical_store::where('date_sold', '>', Carbon::now()->subDays(7))
        ->orderBy('date_sold', 'DESC')
        ->get();

        $thirtysoldlist = Physical_store::where('date_sold', '>', Carbon::now()->subDays(30))
        ->orderBy('date_sold', 'DESC')
        ->get();

        $sevenCount = count($sevensoldlist);
        $thirtyCount = count($thirtysoldlist);

        $Avg = Physical_store::select('unit_price')->where('date_sold', '>', Carbon::now()->subDays(7))->average('unit_price');
        $Max = Physical_store::all()->max('product_name');

        $Avg1 = Physical_store::select('unit_price')->where('date_sold', '>', Carbon::now()->subDays(30))->average('unit_price');
        $Max1 = Physical_store::all()->max('product_name');

        return view('system.physicalStore')->with('list', $sevensoldlist)->with('sold', $thirtysoldlist)->with('seven',$sevenCount)->with('thirty',$thirtyCount)->with('avg',$Avg)->with('max',$Max)->with('avg1',$Avg1)->with('max1',$Max1);

        /* $userlist = Customer::all();
        //$userlist = $this->getUserlist();
        return view('home.list')->with('list', $userlist); */
    }

    public function socialMedialist(){

        $sevensoldlist = Social_media::where('date_sold', '>', Carbon::now()->subDays(7))
        ->orderBy('date_sold', 'DESC')
        ->get();

        $thirtysoldlist = Social_media::where('date_sold', '>', Carbon::now()->subDays(30))
        ->orderBy('date_sold', 'DESC')
        ->get();

        $sevenCount = count($sevensoldlist);
        $thirtyCount = count($thirtysoldlist);

        $Avg = Social_media::select('unit_price')->where('date_sold', '>', Carbon::now()->subDays(7))->average('unit_price');
        $Max = Social_media::all()->max('product_name');

        $Avg1 = Social_media::select('unit_price')->where('date_sold', '>', Carbon::now()->subDays(30))->average('unit_price');
        $Max1 = Social_media::all()->max('product_name');

        return view('system.socialMedia')->with('list', $sevensoldlist)->with('sold', $thirtysoldlist)->with('seven',$sevenCount)->with('thirty',$thirtyCount)->with('avg',$Avg)->with('max',$Max)->with('avg1',$Avg1)->with('max1',$Max1);
    }

    public function ecommercelist(){

        $sevensoldlist = Ecommerce::where('date_sold', '>', Carbon::now()->subDays(7))
        ->orderBy('date_sold', 'DESC')
        ->get();

        $thirtysoldlist = Ecommerce::where('date_sold', '>', Carbon::now()->subDays(30))
        ->orderBy('date_sold', 'DESC')
        ->get();

        $sevenCount = count($sevensoldlist);
        $thirtyCount = count($thirtysoldlist);

        $Avg = Ecommerce::select('unit_price')->where('date_sold', '>', Carbon::now()->subDays(7))->average('unit_price');
        $Max = Ecommerce::all()->max('product_name');

        $Avg1 = Ecommerce::select('unit_price')->where('date_sold', '>', Carbon::now()->subDays(30))->average('unit_price');
        $Max1 = Ecommerce::all()->max('product_name');

        return view('system.ecommerce')->with('list', $sevensoldlist)->with('sold', $thirtysoldlist)->with('seven',$sevenCount)->with('thirty',$thirtyCount)->with('avg',$Avg)->with('max',$Max)->with('avg1',$Avg1)->with('max1',$Max1);
    }

    /*public function getUserlist (){
        return [
                ['id'=>1, 'name'=>'alamin', 'email'=> 'alamin@aiub.edu', 'password'=>'123'],
                ['id'=>2, 'name'=>'abc', 'email'=> 'abc@aiub.edu', 'password'=>'456'],
                ['id'=>3, 'name'=>'xyz', 'email'=> 'xyz@aiub.edu', 'password'=>'789']
            ];
    }*/

    public function delete($id){

        $user = User::find($id);
        return view('home.delete')->with('user', $user);
    }

    public function destroy($id){

        if(User::destroy($id)){
            return redirect('/home/userlist');
        }else{
            return redirect('/home/delete/'.$id);
        }

    }
}