<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dasboard</title>
    @vite('resources/css/app.css')
</head>
<body> 
    <!-- admin dashboard navbar -->
    <nav class="bg-white shadow-md px-4 py-3" >
        <div class="flex justify-between items-center">
            <div class=" text-2xl text-gray-700 hover:text-orange-500 cursor-pointer">
                Quiz system
            </div>
            <div class=" space-x-4">
                <a href="" class="text-gray-700 hover:text-orange-500 cursor-pointer">Categories</a>
                <a href="" class="text-gray-700 hover:text-orange-500 cursor-pointer">Quiz</a>
                <a href="" class="text-gray-700 hover:text-orange-500 cursor-pointer">Welcome {{$name}}</a>
                <a href="" class="text-gray-700 hover:text-orange-500 cursor-pointer">Logout</a>
            </div>

        </div>
    </nav>
    
</body>
</html>