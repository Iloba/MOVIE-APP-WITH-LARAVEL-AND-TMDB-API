@extends('layouts.main')
@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row sm:justify-center">
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
                            
                            @else
                                @break
                            @endif
                        @endforeach
                    </div>
                </div>
                <div x-data="{isOpen: false}">
                    @if (count($movie['videos']['results']) > 0)
                    <div class="mt-12">
                        <button 
                        @click="isOpen = true"
                       
                        class=" inline-flex items-center bg-blue-500 text-white  font-semibold px-5 py-4 hover:bg-blue-600 transition ease-in-out duration-150">
                            <span><i class="icofont icofont-star"></i></span>
                            <span class="ml-2">Play Triller</span>
                    </button>
                    </div>

                    {{-- Modal --}}
                    <div style="background-color: rgba(0,0,0,.5)"
                        x-show.transition.opacity="isOpen"
                        class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto">
                        <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                            <div class="flex justify-end pr-4 pt-2">
                                <button @click="isOpen = false" class="text-3xl leading-none hover:text-gray-300">&times;</button>
                            </div>
                            <div class="modal-body px-8 py-8">
                                <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
                                    <iframe width="560" height="315" 
                                    class="responsive-iframe absolute top-0 left-0 w-full h-full" 
                                    src="https://www.youtube.com/embed/{{$movie['videos']['results'][0]['key']}}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen>
                                </iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                @else
                    <p>no video</p>
                @endif
                </div>
                
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
                            <a href="{{route('actors.show', $cast['id'])}}">
                                <img src="{{'https://image.tmdb.org/t/p/w500/'.$cast['profile_path']}}" alt="movie" class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                            <div class="mt-2">
                                <a href="{{route('actors.show', $cast['id'])}}" class="text-2xl mt-2 hover:text-gray:300">{{$cast['name']}}</a>
                            
                                <div class="text-gray-400 text-sm">
                                {{$cast['character']}}
                                </div>
                            </div>
                        </div>
                    @else
                    @break
                    @endif
                   
                @endforeach
                
            </div>
            
        </div>
    </div>
    <div class="images border-b border-gray-800" x-data="{isOpen: false, image: ''}">
        
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-10">
                @foreach ($movie['images']['backdrops'] as $image)
                    @if ($loop->index < 9)
                        <div class="mt-8">
                            <a href="#"
                            
                            @click.prevent=
                            "
                            isOpen = true,
                            image = '{{'https://image.tmdb.org/t/p/original/'.$image['file_path']}}'

                            "
                            
                            
                            >
                                <img src="{{'https://image.tmdb.org/t/p/w400/'.$image['file_path']}}" alt="movie" class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                            
                        </div>
                    @else
                    @break
                    @endif 
                @endforeach
            </div>
            <div style="background-color: rgba(0,0,0,.5)"
            x-show.transition.opacity="isOpen"
            class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto">
                <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                    <div class="flex justify-end pr-4 pt-2">
                        <button @click="isOpen = false" 
                                @keydown.escape.window="isOpen = false"
                        class="text-3xl leading-none hover:text-gray-300">&times;</button>
                    </div>
                    <div class="modal-body px-8 py-8">
                        <img :src="image" alt="movies">
                    </div>
                </div>
            </div>
        
        </div>
    </div> 
@endsection