<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;                 //session import
use App\Models\Admin;                                   //admin model import
use App\Models\Category;                                //Category model import

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

    function categories(){
        $admin= Session::get('admin');
        if($admin){
            return view('categories',["name"=>$admin->name]);
        }
        else{
            return redirect('admin-login');
        }
    }

    // session destroy
    function logout(){
        Session::flush();
        return redirect('admin-login');
    }

    // add new category 
    function addCategory(Request $request){
        $admin = Session::get('admin');
        $category= new Category();
        $category->name=$request->Category;
        $category->creator=$admin->name;
        
        if($category->save()){
            Session::flash('category','Category: '. $request->Category. " Added succsessfully!!");
        }
        return redirect('admin-categories');
    }

}
