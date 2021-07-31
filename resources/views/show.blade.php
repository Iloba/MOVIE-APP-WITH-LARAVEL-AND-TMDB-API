@extends('layouts.main')
@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="{{'https://image.tmdb.org/t/p/w500/'.$movie['poster_path']}}" alt="movie" class="w-64 md:w-96" style="width: 24rem;">
            <div class="md:ml-24 mt-4 ">
                <h2 class="text-4xl font-semibold">{{$movie['title']}}</h2>
                <div class="flex items-center text-gray-400 text-sm mt-1">
                    <span><i class="icofont icofont-star text-blue-500"></i></span>
                    <span class="ml-1">{{$movie['vote_average'] * 10 . '%'}}</span>
                    <span class="mx-2">|</span>
                    <span class="">{{\Carbon\Carbon::parse($movie['release_date'])->format('M d, Y')}}</span>
                    <span class="mx-2">|</span>
                    <span>
                        @foreach ($movie['genres'] as $genre)
                            {{$genre['name']}} @if ($loop->last) , @endif
                        @endforeach
                    </span>
                </div>
                <p class="mt-10 text-gray-300 ">
                   {{$movie['overview']}}
                </p>
                <div class="mt-12">
                    <h4 class="text-white font-semibold">Featured Cast</h4>
                    <div class="flex mt-4">
                        @foreach ($movie['credits']['crew'] as $crew)
                        @if ($loop->index < 2)
                            <div class="mr-8">
                                <div>
                                   {{$crew['name']}}
                                </div>
                                <div class="text-sm text-gray-400">{{$crew['job']}}</div>
                            </div>
                        @endif
                           
                        @endforeach
                       
                        
                    </div>
                </div>
                @if ($movie['videos']['results'] > 0)
                    <div class="mt-12">
                        <a href="https://youtube.com/watch?v={{$movie['videos']['results'][0]['key']}}" 
                        class=" inline-flex items-center bg-blue-500 text-white  font-semibold px-5 py-4 hover:bg-blue-600 transition ease-in-out duration-150">
                            <span><i class="icofont icofont-star"></i></span>
                            <span class="ml-2">Play Triller</span>
                        </a>
                    </div>
                @endif
                
            </div>
        </div>
    </div> 
    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Cast</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($movie['credits']['cast'] as $cast)
                    @if($loop->index < 5)
                        <div class="mt-8">
                            <a href="#">
                                <img src="{{'https://image.tmdb.org/t/p/w500/'.$cast['profile_path']}}" alt="movie" class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                            <div class="mt-2">
                                <a href="#" class="text-2xl mt-2 hover:text-gray:300">{{$cast['name']}}</a>
                            
                                <div class="text-gray-400 text-sm">
                                {{$cast['character']}}
                                </div>
                            </div>
                        </div>
                    @endif
                   
                @endforeach
              
                
               
                
            </div>
        </div>
    </div>
    <div class="images border-b border-gray-800">
        
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-10">
                @foreach ($movie['images']['backdrops'] as $image)
                    @if ($loop->index < 6)
                        <div class="mt-8">
                            <a href="#">
                                <img src="{{'https://image.tmdb.org/t/p/w400/'.$image['file_path']}}" alt="movie" class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                            
                        </div>
                    @endif 
                @endforeach
               
                
               
               
               
               
            </div>
        </div>
    </div> 
@endsection