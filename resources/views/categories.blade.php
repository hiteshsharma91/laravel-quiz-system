<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Categories page</title>
    @vite('resources/css/app.css')
</head>
<body> 
    <x-navbar name="{{$name}}"></x-navbar>

    <!-- session message -->
    @if(session('category'))
    <div class=' bg-green-800 text-white pl-5'>{{session('category')}}</div>
    @endif
    
    <div class=' bg-gray-400 flex justify-center pt-10'>
        <div class=' bg-white p-8 rounded-2xl shadow-lg w-full max-w-sm'>
           <h2 class=" text-2xl text-center text-gray-800 mb-6">Add Category</h2>
           
           <!-- admin category form -->
           <form action="add-category" method="post" class=" space-y-4">
               @csrf 
               <div>
   
                   <!-- admin category input field   -->
                   <input type="text" name="Category" placeholder="Enter Category"
                   class=" w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
               </div>
   
               <!-- category button -->
               <button type="submit" class="w-full px-4 py-2 text-white bg-green-400 rounded-xl cursor-pointer">Add</button>
           </form>
   
       </div>
    </div>
</body>
</html>