<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TvController extends Controller
{
    public function index(){

        $popularTv = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/tv/popular')
        ->json()['results'];

       

        $topRatedTv = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/tv/top_rated')
        ->json()['results'];

        $genresArray = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/genre/tv/list')
        ->json()['genres'];

        $genres = collect($genresArray)->mapwithKeys(function($genre){
            return [$genre['id'] => $genre['name']];
        });

        return view('tv.index',[
            'popularTv' => $popularTv,
            'topRatedTv' => $topRatedTv,
            'genres' => $genres
        ]);

    }

    public function show($id){

        $tvshow = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/tv/'.$id.'?append_to_response=credits,videos,images')
        ->json();



        return view('tv.show',[
            'tvshow' => $tvshow
        ]);
    
    }
}
