<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Categories page</title>
    @vite('resources/css/app.css')
</head>
<body> 
    <x-navbar name="{{$name}}"></x-navbar>
    
    <div class="bg-gray-200 min-h-screen pt-10 px-4">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
        Quiz : {{$quizName}}
        <!-- <a class="cursor-pointer underline text-red-600 text-sm" href="/add-quiz">Back</a>  -->
    </h2>

    <div class="mx-auto w-full max-w-4xl bg-white shadow-lg rounded-xl">
        <ul class="border-b border-gray-300 p-3 font-bold bg-gray-700">
            <li class="flex justify-between text-white">
                <span class="w-1/4">MCQ Id</span>
                <span class="w-3/4">Question</span>
            </li>
        </ul>

        @foreach($mcqs as $mcq)
        <ul class="border-b p-3 even:bg-gray-100">
            <li class="flex justify-between">
                <span class="w-1/4">{{ $mcq->id }}</span>
                <span class="w-3/4">{{ $mcq->question }}</span>
            </li>
        </ul>
        @endforeach
    </div>
</div>

</body>
</html>