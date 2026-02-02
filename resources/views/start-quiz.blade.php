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
        <h1 class="text-4xl font-bold text-center text-green-800 mb-6">
        {{$quizName}}
        </h1>
        <h2 class="text-lg font-bold text-center text-green-700 mb-6">
            These Quiz container has {{$quizCount}} Queations and no timing limit to attempt these questions.
        </h2>
        <h3 class="text-3xl font-bold text-center text-green-800 mb-6">
        Good Luck!!
        </h3>
        <div class="flex justify-center mt-6">
        <a
            type="submit"
            href="/user-signup"
            class="px-4 py-2 text-white bg-blue-600 rounded-md cursor-pointer">
            Login/SignUp for start Quiz
        </a>
         </div>

    </div>
</body>
</html>