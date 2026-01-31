<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;                                //Category model import
use App\Models\Quiz;                                    //Quiz model import


class UserController extends Controller
{
    //user home page
    function welcome(){
        $categories= Category::withCount('quizzes')->get();
        return view('welcome',["categories"=> $categories]);
    }

    function UserQuizList($id, $category){

        $quizData= Quiz::where('category_id', $id)->get();
        return view('user-quiz-list',["quizData"=>$quizData, "category"=>$category]);
        
    }
}
