<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;                 //session import
use App\Models\Admin;                                   //admin model import
use App\Models\Category;                                //Category model import
use App\Models\Quiz;                                    //quiz model import

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

    // category page
    function categories(){
        $categories= Category::get(); //get categories list
        $admin= Session::get('admin');
        if($admin){
            return view('categories',["name"=>$admin->name, "categories"=>$categories]);
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
        $validation= $request->validate([
            "Category"=>"required | min:3 | unique:categories,name"
        ]);
        $admin = Session::get('admin');
        $category= new Category();
        $category->name=$request->Category;
        $category->creator=$admin->name;
        
        if($category->save()){
            Session::flash('category','Category: '. $request->Category. " Added succsessfully!!");
            return redirect('admin-categories');
        }
    }

    // Delet category form list
    function deleteCategory( $id){
        $isDeleted= Category::find($id)->delete(); 
        
        if($isDeleted){
            Session::flash('category','Category: Deleted succsessfully!!');
            return redirect('admin-categories');
        }   
    }

    // add quiz 
    function addQuiz(){
        $categories= Category::get();
        $admin= Session::get('admin');
        if($admin){
            $quizName= request('quiz');
            $category_id= request('Category_id');

            if($quizName && $category_id && !Session::has('quizDetails')){
                $quiz= new Quiz();
                $quiz->name=$quizName;
                $quiz->category_id=$category_id;

                if($quiz->save()){
                    Session::put('quizDetails', $quiz);
                }
            }

            return view('add-quiz',["name"=>$admin->name, "categories"=>$categories]);
        }
        else{
            return redirect('admin-login');
        }    }

}
