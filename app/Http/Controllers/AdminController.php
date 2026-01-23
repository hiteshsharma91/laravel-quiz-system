<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;                 //session import
use App\Models\Admin;                                   //model import

class AdminController extends Controller
{
    function login(Request $request){

        //username and password is required.
        $validation= $request->validate([              
            "name"=>"required",
            "password"=>"required"
        ]);

        // if username and password is correct.
        $admin= Admin::where([                            
            ['name', "=", $request->name],
            ['password', "=" ,$request->password]])->first();
        
        //if username is incorrect.
        if(!$admin){                                        
            $validation= $request->validate([
                "user"=>"required"
            ],
            [
                "user.required"=>"user does not exist"
            ]);
        }

        //create session for admin dashboard.
        Session::put('admin', $admin);                     
        return redirect('dashboard');
    }

    // admin dasboard

    function dashboard(){

        //create session for admin dashboard.
        $admin= Session::get('admin');                    
        if($admin){
            return view('admin',['name'=>$admin->name]);
        }
        else{
            return redirect('admin-login');
        }
    }


}
