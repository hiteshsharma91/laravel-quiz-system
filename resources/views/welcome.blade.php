<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-user-navbar></x-user-navbar>

    <div class="flex flex-col items-center min-h-screen bg-gray-300">
        <h1 class="text-2xl font-bold text-green-900 p-5">Test Your Skills</h1>
        <div class="w-full max-w-md">
            <div class="relative">
                <input class="w-full px-4 py-2 text-gray-800 border border-gray-400 rounded-2xl shadow-gray-400 shadow" 
                type="text" placeholder="Search quizz...">
                <button class=" absolute right-4 top-2">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#666666"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/></svg>
                </button>
            </div>
        </div>
        <div class="w-200 shadow-lg my-4">
           <h1 class="text-2xl text-white text-center font-semibold bg-gray-500 mt-7 my-1">Category List</h1>
           <ul class="border border-gray-300">
                <li class="p-2 text-white bg-gray-800 font-bold">
                    <ul class=" flex justify-between ">
                        <li class="w-30">S.No.</li>
                        <li class="w-70">Name</li>
                        <li class="w-30">Action</li>
                    </ul>
                </li>
            @foreach($categories as $key=>$category )
            <li class="even:bg-gray-400 p-2">
                <ul class=" flex justify-between">
                    <li class="w-30">{{$key+1}}</li>
                    <li class="w-70">{{$category->name}}</li>
                    <li class="w-30 cursor-pointer flex space-x-2">
                        <a href="quiz-list/{{$category->id}}/{{$category->name}}" class="flex underline">View</a>
                    </li>
                </ul>
            </li>
            @endforeach
           </ul>
       </div>
    </div>
    <x-footer-user></x-footer-user>
</body>
</html>