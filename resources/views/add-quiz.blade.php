<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Quiz page</title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-navbar name="{{$name}}"></x-navbar>

    <div class=' bg-gray-200 flex flex-col items-center min-h-screen pt-7'>
        <div class=' bg-white p-8 rounded-2xl shadow-lg w-full max-w-md'>
            @if(!session('quizDetails'))
           <h2 class=" text-2xl text-center text-gray-800 mb-6">Add Quiz</h2>

           <form action="add-quiz" method="get" class=" space-y-4" >
               <!-- @csrf  -->
               <div>
                   <input type="text" name="quiz" placeholder="Enter Quiz here" required
                   class=" w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
               </div>
               <div>
                   <select type="text" name="Category_id"
                   class=" w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">

                   @foreach($categories as $category)
                   <option value="{{$category->id}}">{{$category->name}}</option>
                   @endforeach
                    </select>
               </div>
               <button type="submit" class="w-full px-4 py-2 text-white bg-green-400 rounded-xl cursor-pointer">Add</button>
           </form>
           @else
           <div class=" bg-gray-600 rounded-2xl font-bold text-center text-white">
               <span class="">Quiz: {{session('quizDetails')->name}}</span><br>
               <p class="text-white ">Total MCQs: {{$totalMCQs}}
                @if($totalMCQs > 0)
                <span class=" rounded-xl"><a href="show-quiz/{{session('quizDetails')->id}}" class="cursor-pointer underline text-orange-300">Show MCQs</a></span>
                @endif
               </p>
            </div>
           <h2 class=" text-2xl text-center font -bold text-gray-800 mb-6">Add MCQs</h2>
           <form action="add-mcq" method="post" class="space-y-4">
            @csrf
                <div>
                   <textarea type="text" name="question" placeholder="Enter your question"
                   class=" w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none"></textarea>
                   @error('question')
                   <div class="text-red-500">{{$message}}</div>
                   @enderror 
               </div>
                <div>
                   <input type="text" name="a" placeholder="Enter option A"
                   class=" w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
                    @error('a')
                   <div class="text-red-500">{{$message}}</div>
                   @enderror 
               </div>
                <div>
                   <input type="text" name="b" placeholder="Enter option B"
                   class=" w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
                    @error('b')
                   <div class="text-red-500">{{$message}}</div>
                   @enderror 
               </div>
                <div>
                   <input type="text" name="c" placeholder="Enter option C"
                   class=" w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
                    @error('c')
                   <div class="text-red-500">{{$message}}</div>
                   @enderror 
               </div>
                <div>
                   <input type="text" name="d" placeholder="Enter option D"
                   class=" w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
                    @error('d')
                   <div class="text-red-500">{{$message}}</div>
                   @enderror 
               </div>
                <div>
                   <select name="correct_ans"
                   class=" w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
                   <option value="">Select Right Answer</option>
                   <option value="a">A</option>
                   <option value="b">B</option>
                   <option value="c">C</option>
                   <option value="d">D</option>
                   </select>
                    @error('correct_ans')
                   <div class="text-red-500">{{$message}}</div>
                   @enderror 
               </div>
               <button type="submit" name="submit" value="add-more" class="w-full px-4 py-2 text-white bg-blue-400 rounded-xl cursor-pointer">Add More</button>
               <button type="submit" name="submit" value="done" class="w-full px-4 py-2 text-white bg-green-400 rounded-xl cursor-pointer">Add and Submit</button>
               <a class="w-full px-4 py-2 text-white bg-red-500 block text-center rounded-xl cursor-pointer" href="/end-quiz">Finish Quiz</a>
           </form>
           @endif
       </div>
    </div>

</body>
</html>
