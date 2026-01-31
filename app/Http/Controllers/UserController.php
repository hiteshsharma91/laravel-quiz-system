<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;                                //Category model import


class UserController extends Controller
{
    //user home page
    function welcome(){
        $categories= Category::get();
        return view('welcome',["categories"=> $categories]);
    }
}
