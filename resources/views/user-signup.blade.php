<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User signup</title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-user-navbar></x-user-navbar>
    
    <div class=' bg-gray-400 flex items-center justify-center min-h-screen' >
        <div class=' bg-white p-8 rounded-2xl shadow-lg w-full max-w-sm'>
            <h2 class=" text-2xl text-center text-gray-800 mb-6">User SignUp</h2>
            <div class=" text-red-500">
    
                @error('user')
                {{$message}}
                @enderror
            </div>
            
            <form action="user-signup" method="post" class=" space-y-4">
                @csrf 
                <div>
    
                    <label for="" class=" text-gray-600 mb-1">User Name</label>
                    <input type="text" name="name" placeholder="Enter username"
                    class=" w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
    
                    @error('name')
                    <div class="text-red-500">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div>
    
                    <label for="" class=" text-gray-600 mb-1">User Email</label>
                    <input type="email" name="email" placeholder="Enter user email"
                    class=" w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
    
                    @error('email')
                    <div class="text-red-500">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div>
    
                    <label for="" class=" text-gray-600 mb-1">Password</label>
                    <input type="password" name="password" placeholder="Enter user password"
                    class=" w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
                    <div class=" text-red-500">
    
                        @error('password')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div>
    
                    <label for="" class=" text-gray-600 mb-1">Confirm Password</label>
                    <input type="password" name="password_confirmation" placeholder="Confirm password"
                    class=" w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
        
                </div>
    
                <button type="submit" class="w-full px-4 py-2 text-white bg-green-400 rounded-xl cursor-pointer">SignUp</button>
            </form>
    
        </div>
    
    
    </div>
</body>
</html>
