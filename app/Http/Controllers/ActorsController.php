<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ActorsController extends Controller
{
    public function index(){

        $popularActors = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/person/popular')
        ->json()['results'];

        dump($popularActors);
        //Passs to view model
        // $viewModel = new ActorsViewModel($popularActors);

        return view('actors.index',[
            'popularActors' => $popularActors,
            
        ]);
    }
}
