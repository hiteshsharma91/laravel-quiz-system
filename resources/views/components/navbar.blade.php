    <!-- admin dashboard navbar -->
    <nav class="bg-white shadow-md px-4 py-3" >
        <div class="flex justify-between items-center">
            <div class=" text-2xl text-gray-700 hover:text-orange-500 cursor-pointer">
                Quiz system
            </div>
            <div class=" space-x-4">

                <a href="dashboard" class="text-gray-700 hover:text-orange-500 cursor-pointer">Dashboard</a>
                <a href="admin-categories" class="text-gray-700 hover:text-orange-500 cursor-pointer">Categories</a>
                <a href="/add-quiz-reset" class="text-gray-700 hover:text-orange-500 cursor-pointer">Quiz</a>
                <a href="" class="text-gray-700 hover:text-orange-500 cursor-pointer">Welcome {{$name}}</a>
                <a href="/admin-logout" class="text-gray-700 hover:text-orange-500 cursor-pointer">Logout</a>
            </div>

        </div>
    </nav>