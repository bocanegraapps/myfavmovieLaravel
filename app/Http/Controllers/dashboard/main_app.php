<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;

class main_app extends Controller
{
  public function index()
  {
    $my_movies = Movie::all();
    return view('content.dashboard.main_app')->with('my_movies',$my_movies);
  }
}
