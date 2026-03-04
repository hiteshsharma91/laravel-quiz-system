<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MCQs page</title>
    @vite('resources/css/app.css')
</head>
<body> 
    <x-user-navbar></x-user-navbar>
    
    @if(session('message'))
    <p class="text-green-500">{{'message'}}</p>
    @endif

    <div class="bg-gray-200 flex flex-col items-center min-h-screen pt-5">
        <h1 class="text-2xl font-bold text-center text-green-800 mb-6">
            {{ session('currentQuiz')['quizName'] }}

        </h1>
        <h2 class="text-2xl font-bold text-center text-green-800 mb-6">
            Question no. {{session('currentQuiz')['totalMcq']}}
        </h2>
        <h2 class="text-xl font-bold text-center text-green-800 mb-6">
            {{ session('currentQuiz')['currentMcq'] }} of {{session('currentQuiz')['totalMcq']}}
        </h2>
        <div class="mt-2 p-4 bg-gray-400 rounded-xl shadow-2xl w-200">
            <h3 class= "font-bold text-xl">
                {{$mcqData->question}}
            </h3>
            <form action="/submit-next/{{$mcqData->id}}" method="post" class="space-y-3">
                @csrf
                <input type="hidden" name="id" value="{{$mcqData->id}}">
                <label class="flex border rounded-2xl mt-2 p-3 shadow-2xl hover:bg-blue-100 cursor-pointer" for="option_1">
                    <input id="option_1" class="form-radio text-blue-500" type="radio" value="a" name="option">
                    <span class="text-gray-800 font-medium pl-4">{{$mcqData->a}}</span>
                </label>
                <label class="flex border rounded-2xl mt-2 p-3 shadow-2xl hover:bg-blue-100 cursor-pointer" for="option_2">
                    <input id="option_2" class="form-radio text-blue-500" type="radio" value="b" name="option">
                    <span class="text-gray-800 font-medium pl-4">{{$mcqData->b}}</span>
                </label>
                <label class="flex border rounded-2xl mt-2 p-3 shadow-2xl hover:bg-blue-100 cursor-pointer" for="option_3">
                    <input id="option_3" class="form-radio text-blue-500" type="radio" value="c" name="option">
                    <span class="text-gray-800 font-medium pl-4">{{$mcqData->c}}</span>
                </label>
                <label class="flex border rounded-2xl mt-2 p-3 shadow-2xl hover:bg-blue-100 cursor-pointer" for="option_4">
                    <input id="option_4" class="form-radio text-blue-500" type="radio" value="d" name="option">
                    <span class="text-gray-800 font-medium pl-4">{{$mcqData->d}}</span>
                </label>
                <button type="submit" class="w-100 px-4 py-2 mt-4 text-white bg-green-600 rounded-xl cursor-pointer">save and next</button>
            </form>
        </div>
    </div>
    <x-footer-user></x-footer-user>
</body>
</html>