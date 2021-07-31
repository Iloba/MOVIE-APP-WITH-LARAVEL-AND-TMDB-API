<div>
    <div class="relative mt-4 md:mt-0">
        <input wire:model.debounce.500ms="search" type="text" class="bg-gray-800 text-sm rounded-full w-64 px-4 py-1 p-3 pl-8 focus:outline-none focus:shadow-outline" placeholder="Search">
        <div class="absolute top-0">
            <i style="font-size: 12px;" class="icofont icofont-search fill-current text-gray-500   ml-3 "></i>
        </div>
        <div wire:loading class="spinner top-0 right-0 mr-4 mt-4">
    </div>
    

    </div>
    @if (strlen($search) > 2)
    <div class="absolute bg-gray-800 rounded w-64 mt-4 text-sm">
        @if ($searchResults->count() > 0)
        <ul>
            @foreach ($searchResults as $result)
                <li class="border-b border-gray-700">
                    <a class="block hover:bg-gray-700 px-3 py-3 flex items-center" href="{{route('movies.show', $result['id'])}}">
                        @if ($result['poster_path'])
                             <span><img src="https://image.tmdb.org/t/p/w92/{{$result['poster_path']}}" class="w-8" alt="movie"></span>
                        @else
                        <span><img src="https://image.tmdb.org/t/p/w92/{{$result['poster_path']}}" class="w-8" alt="movie"></span>
                        @endif
                       
                        <span class="ml-4">{{$result['title']}}</span>
                    </a>
                </li>
            @endforeach
           
        </ul>
        @else
            <div class="px-3 py-3">
                No results found for "{{$search }}"
            </div>
        @endif
        
    </div>
    @endif
    
</div>
