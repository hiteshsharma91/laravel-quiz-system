<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin login</title>
    @vite('resources/css/app.css')
</head>
<body class=' bg-gray-400 flex items-center justify-center min-h-screen' >
    <div class=' bg-white p-8 rounded-2xl shadow-lg w-full max-w-sm'>
        <h2 class=" text-2xl text-center text-gray-800 mb-6">Admin login</h2>
        <form action="admin-login" method="post" class=" space-y-4">
            @csrf 
            <div>
                <label for="" class=" text-gray-600 mb-1">Admin name</label>
                <input type="text" name="name" placeholder="Enter Admin name"
                class=" w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
            </div>
            <div>
                <label for="" class=" text-gray-600 mb-1">Password</label>
                <input type="password" name="password" placeholder="Enter Admin password"
                class=" w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
            </div>
            <button type="submit" class="w-full px-4 py-2 text-white bg-green-400 rounded-xl">Login</button>
        </form>

    </div>


</body>
</html>
