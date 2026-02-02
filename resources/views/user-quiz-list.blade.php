<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Categories page</title>
    @vite('resources/css/app.css')
</head>
<body> 
    <x-user-navbar></x-user-navbar>
    
    <div class="bg-gray-200 min-h-screen pt-10 px-4">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
        Category Name: {{$category}}
        <!-- <a class="cursor-pointer underline text-red-600 text-sm" href="/add-quiz">Back</a> -->
    </h2>

    <div class="mx-auto w-full max-w-4xl bg-white shadow-lg rounded-xl">
        <ul class="border-b border-gray-300 p-3 font-bold bg-gray-700">
            <li class="flex justify-between text-white">
                <span class="w-1/4">Quiz Id</span>
                <span class="w-3/4">Name</span>
                <span class="w-3/4">Questions</span>
                <span class="w-3/4">Action</span>
            </li>
        </ul>

        @foreach($quizData as $item)
        <ul class="border-b p-3 even:bg-gray-100 ">
            <li class="flex justify-between">
                <span class="w-1/4">{{ $item->id }}</span>
                <span class="w-3/4">{{ $item->name }}</span>
                <span class="w-3/4">{{ $item->mcq_count }}</span>
                <span class="w-3/4 text-green-600 font-bold ">
                    <a href="/start-quiz/{{$item->id}}/{{$item->name}}">Attempt Questions</a>
                </span>
            </li>
        </ul>
        @endforeach
    </div>
</div>

</body>
</html>