<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie Application</title>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('icofont/icofont/icofont.min.css')}}">
</head>
<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800">
       <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4 py-6">
            <ul class="flex flex-col md:flex-row items-center">
               <li>
                    <a href="#">
                        <h2 class="text-2xl"><i class="icofont icofont-ui-movie w-70 "></i> MovieApp</h2>
                    </a>
               </li>
               <li class="mt-4 md:mt-0">
                   <a href="#" class="md:ml-6 hover:text-gray-300">Movies</a>
               </li>
               <li class="mt-4 md:mt-0">
                   <a href="#" class="md:ml-6 hover:text-gray-300">Tv Shows</a>
               </li>
               <li class="mt-4 md:mt-0">
                   <a href="#" class="md:ml-6 hover:text-gray-300">Actors</a>
               </li>
            </ul>
            <div class="flex flex-col md:flex-row items-center ">
                <div class="relative mt-4 md:mt-0">
                    <input type="text" class="bg-gray-800 text-sm rounded-full w-64 px-4 py-1 p-3 pl-8 focus:outline-none focus:shadow-outline" placeholder="Search">
                    <div class="absolute top-0">
                        <i style="font-size: 12px;" class="icofont icofont-search fill-current text-gray-500   ml-3 "></i>
                    </div>
                </div>
                <div class="md:ml-4 mt-4 md:mt-0">
                    <a href="#">
                        <i class="icofont icofont-ui-user w-8 h-8 bg-gray-800 rounded-full p-3"></i>
                    </a>
                </div>
            </div>
       </div>
    </nav>
    @yield('content')
</body>
</html>