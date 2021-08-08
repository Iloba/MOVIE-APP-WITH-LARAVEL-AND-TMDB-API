@extends('layouts.main')
@section('content')
        <div class="container mx-auto px-4 pt-16">
            <div class="popular-actors">
               
                <h2 class="uppercase tracking-wider text-blue-500 text-lg font-semibold">popular Actors</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 mb-12">
                    @foreach ($popularActors as $actor)
                        <div class="actor mt-8">
                            <a href="#">
                                @if ($actor['profile_path'])
                                <img src="{{'https://image.tmdb.org/t/p/w235_and_h235_face'.$actor['profile_path']}}" class="hover:opacity-75 transition ease-in-out duration-150" alt="Movie APP">
                                @else
                                <img src="https://via.placeholder.com/150" alt="movieapp">
                                @endif
                               
                            </a>
                            <div class="mt-2">
                                <a href="#" class="text-lg hover:text-gray-300">{{$actor['name']}}</a>
                                <div class="text-sm truncate text-gray-400">
                                    {{-- @foreach ($actor['known_for'] as $known) --}}
                                        {{-- {{$known}} --}}
                                    {{-- @endforeach --}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                   
                </div>
            </div>
            <div class="flex justify-between mt-16">
                <a href="#">Previous</a>
                <a href="#">Next</a>
            </div>
        </div>
@endsection