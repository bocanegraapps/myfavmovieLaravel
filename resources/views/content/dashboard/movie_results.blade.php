@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('content')
<div class="row">
  
  <!-- Lista de películas -->
  <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
    <div class="card">
      <div class="row row-bordered g-0">
        <div class="col-md-12">
          <h5 class="card-header m-0 me-2 pb-3">Resultado de la búsqueda</h5>
          
          <!-- LISTA RESULTADOS -->
          <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>Poster</th>
                <th>Id en TMDB</th>
                <th>Título</th>
                <th>Gestiones</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            @foreach ($results as $movie)  
            <tr>
                <td><img src="https://image.tmdb.org/t/p/w94_and_h141_bestv2/{{ $movie->poster_path }}"></img></td>
                <td>{{ $movie->id }}</td>
                <td>{{ $movie->title }}</td>
                <td><a href="{{ route('add_movie',[$movie->id]) }}" class="btn btn-success">Añadir</button></td>
              </tr>
             @endforeach
            </tbody>
          </table>
        </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Total Revenue -->
  
</div>

@endsection
