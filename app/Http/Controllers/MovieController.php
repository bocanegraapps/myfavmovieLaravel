<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Facades\Redirect;

class MovieController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function movie_search (Request $r)
    {
        //buscar peli en TMDB
        $cad_busqueda = $r->movie_search;
        $tmbd_apikey = "eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI3YWZhNzc0N2JjYjJmZGVhM2FjODRhZjhlNzk3YTliMCIsInN1YiI6IjY1NGY4ZTM1ZDRmZTA0MDEzOTdmNDc3NiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.8SFMlFimhoLrjso7gqMFJ0wTH6yfFWh81tPCRfDjlK0";

        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://api.themoviedb.org/3/search/movie?query='.$cad_busqueda.'&include_adult=false&language=es-ES', [
            'headers' => [
            'Authorization' => 'Bearer '.$tmbd_apikey,
            'accept' => 'application/json',
            ],
        ]);

        $results = json_decode($response->getBody()->getContents());
        return view('content.dashboard.movie_results')->with('results',$results->results);
       
    }

    public function add_movie($id_movie)
    {
        $myMovie = Movie::where('id_movie_mdb',$id_movie)->first();
        //si no existe en mi lista de favoritos, añadir
        if (!$myMovie)
        {
            //obtener datos de la API
            $tmbd_apikey = "eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI3YWZhNzc0N2JjYjJmZGVhM2FjODRhZjhlNzk3YTliMCIsInN1YiI6IjY1NGY4ZTM1ZDRmZTA0MDEzOTdmNDc3NiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.8SFMlFimhoLrjso7gqMFJ0wTH6yfFWh81tPCRfDjlK0";
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', 'http://api.themoviedb.org/3/movie/'.$id_movie.'&include_adult=false&language=es-ES', [
                'headers' => [
                    'Authorization' => 'Bearer '.$tmbd_apikey,
                    'accept' => 'application/json',
                ],
            ]);
            $movie = json_decode($response->getBody()->getContents());
            //persistir con Eloquent
            $newMovie = new Movie();
            $newMovie->id_movie_mdb = $movie->id;
            $newMovie->title = $movie->title;
            $newMovie->valoration = 5;
            $newMovie->poster = $movie->poster_path;
            $newMovie->save();
 
        }
        
        return redirect::to('/');

    }
    
    public function update_valoration(request $r, $id_movie)
    {
        $movie = Movie::where('id_movie',$id_movie)->first();
        if ($movie)
        {
            $movie->valoration = intval($r->valoration);
            $movie->save();

        }

        return redirect::to('/');
    }

    public function delete_movie($id_movie)
    {
        $movie = Movie::destroy($id_movie);
        return redirect::to('/');
    }

}