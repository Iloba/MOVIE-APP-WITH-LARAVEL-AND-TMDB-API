@extends('layouts.main')
@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            @if ($actor['profile_path'])
            <img src="{{'https://image.tmdb.org/t/p/w300/'.$actor['profile_path']}}" alt="movie" class="w-64 md:w-96" style="width: 24rem;">
            @else 
            <img src="https://via.placeholder.com/150" class="w-8" alt="movie">
            @endif
            <div class="md:ml-24 mt-4 ">
                <h2 class="text-4xl font-semibold">{{$actor['name']}}</h2>
                <div class="flex items-center text-gray-400 text-sm mt-1">
                    <span><i class="icofont icofont-birthday-cake text-blue-500"></i></span>
                    <span class="ml-2">{{\Carbon\Carbon::parse($actor['birthday'])->format('M d, Y')}} ({{\Carbon\Carbon::parse($actor['birthday'])->age}} years old) Born in {{$actor['place_of_birth']}}</span>
                </div>
                <p class="mt-10 text-gray-300 ">
                    {{$actor['biography']}}
                </p>
            </div>
        </div>
    </div> 
  
    </div>

    </div> 
@endsection