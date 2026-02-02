<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Category;                                //Category model import
use App\Models\Quiz;                                    //Quiz model import
use App\Models\Mcq;                                    //Quiz model import
use App\Models\User;                                    //Quiz model import


class UserController extends Controller
{
    //user home page
    function welcome(){
        $categories= Category::withCount('quizzes')->get();
        return view('welcome',["categories"=> $categories]);
    }

    function UserQuizList($id, $category){

        $quizData= Quiz::withCount('Mcq')->where('category_id', $id)->get();
        return view('user-quiz-list',["quizData"=>$quizData, "category"=>$category]);    
    }

    function startQuiz($id, $name){
        // 
        $quizCount= Mcq::where('quiz_id',$id)->count();
        $quizName= $name;

        return view('start-quiz',["quizName"=>$quizName, "quizCount"=>$quizCount]);
    }

    function userSignup(Request $request){
        //
        $validate= $request->validate([
            "name"=>'required | min:3',
            "email"=>'required | email',
            "email"=>'required | email | unique:users',
            "password"=>'required | min:3 | confirmed'
        ]);
        $user= User::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>Hash::make($request->password)
        ]);

        if($user){
            Session::put('user',$user);
            return redirect('/');
        }
    }
}
