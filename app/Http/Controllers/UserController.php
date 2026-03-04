<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Category;                                //Category model import
use App\Models\Quiz;                                    //Quiz model import
use App\Models\Mcq;                                    //mcq model import
use App\Models\User;                                    //user model import
use App\Models\Record;                                    //records model import
use App\Models\Mcq_record;                                    //records model import


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
        $mcqs = Mcq::where('quiz_id', $id)->get();

        if ($mcqs->isEmpty()) {
            return redirect()->back()->with('message', 'MCQs not available');
    }

    Session::put('firstMCQ', $mcqs->first());

    $quizCount = $mcqs->count();
    return view('start-quiz', [
        "quizName" => $name,
        "quizCount" => $quizCount
    ]);
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
            if(Session::has('quiz-url')){
                $url= Session::get('quiz-url');
                Session::forget('quiz-url');
                return redirect($url);
            }
            return redirect('/');
        }
    }

    function userLogout(){ 
        Session::forget('user');
        return redirect('/');
    }

    function userSignupQuiz(){
        Session::put('quiz-url', url()->previous());
        return view('user-signup');
    }

    function userLogin(Request $request){
        //
        $validate= $request->validate([
            "email"=>'required | email ',
            "password"=>'required'
        ]);

        $user= User::where('email',$request->email)->first();
        if(!$user || !Hash::check($request->password,$user->password)){
            return "User not valid, Please check email and password again.";
        }

        if($user){
            Session::put('user',$user);
            if(Session::has('quiz-url')){
                $url= Session::get('quiz-url');
                Session::forget('quiz-url');
                return redirect($url)->with('message',"user Login successfully!!");
            }
            else{
                return redirect('/')->with('message',"user Login successfully!!");
            }
        }
    }

    function userLoginQuiz(){
        Session::put('quiz-url', url()->previous());
        return view('user-login');
    }

    function mcq($id, $name){
        $record= new Record();
        $record->user_id= Session::get('user')->id;
        $record->quiz_id= Session::get('firstMCQ')->quiz_id;
        $record->status= 1;

        if($record->save()){

            if (!Session::has('firstMCQ')) {
            return redirect('/')->with('message', 'Session expired');
        }
            $firstMCQ = Session::get('firstMCQ');
    
            $currentQuiz = [];
            $currentQuiz['totalMcq'] = Mcq::where('quiz_id', $firstMCQ->quiz_id)->count();
            $currentQuiz['currentMcq'] = 1;
            $currentQuiz['quizName'] = $name;
            $currentQuiz['quizId'] = $firstMCQ->quiz_id;
            $currentQuiz['recordId'] = $record->id;
    
            Session::put('currentQuiz', $currentQuiz);
    
            $mcqData = Mcq::find($id);
    
            return view('mcq-page', compact('name', 'mcqData'));
        }
        else{
            return "something went worng";
        }
        }

    
    function submitAndNext(Request $request ,$id){
        $currentQuiz= Session::get('currentQuiz');
        $currentQuiz['currentMcq']+1;
        $mcqData= Mcq::where([
            ['id','>',$id],
            ['quiz_id','=',$currentQuiz['quizId']]
        ])->first();

        $mcq_record= new Mcq_record;
        $mcq_record->record_id= $currentQuiz['recordId'];
        $mcq_record->user_id= Session::get('user')->id;
        $mcq_record->mcq_id=$request->id;
        $mcq_record->select_answer= $request->option;
        if($request->option == Mcq::find($request->id)->correct_ans){
            $mcq_record->is_correct=1; 
        }
        else{
            $mcq_record->is_correct=0; 
        }
        if(!$mcq_record->save()){
            return "something went wrong";
        }
            
        
        
        Session::put('currentQuiz',$currentQuiz);
        if($mcqData){
            return view('mcq-page',['quizName'=>$currentQuiz['quizName'],'mcqData'=>$mcqData]);
        }
        else{
            return "result page";
        }
    }
}
