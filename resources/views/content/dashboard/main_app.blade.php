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
  <div class="col-lg-12 mb-4 order-0">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-sm-12">
          <div class="card-body">
            <h5 class="card-title text-primary">¡Te doy la bienvenida! 🎉</h5>
            <p class="mb-4">Esto es una sencilla aplicación para agregar películas favoritas a una lista programada bajo el framework php LARAVEL para la prueba técnica del track de PHP de Hack A Boss impartido por Guillermo Maquieira para EMAIS</p>
            
          </div>
        </div>
      </div>
    </div>
  </div>
 
  <!-- Lista de películas -->
  <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
    <div class="card">
      <div class="row row-bordered g-0">
        <div class="col-md-12">
          <h5 class="card-header m-0 me-2 pb-3">Lista de mis películas favoritas</h5>
          
          <!-- LISTA DE MIS PELIS -->
          <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>Poster</th>
                <th>Id</th>
                <th>Id en TMDB</th>
                <th>Título</th>
                <th>Valoración</th>
                <th>Gestiones</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            @foreach ($my_movies as $movie)  
            <tr>
                <td><img src="https://image.tmdb.org/t/p/w94_and_h141_bestv2/{{ $movie->poster }}"></img></td>
                <td>{{ $movie->id_movie }}</td>
                <td>{{ $movie->id_movie_mdb }}</td>
                <td>{{ $movie->title }}</td>
                <td>{{ $movie->valoration }}</td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#valorar{!! $movie->id_movie !!}" href="#"><i class="bx bx-edit-alt me-1"></i> Valorar</a>
                      <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#eliminar{!! $movie->id_movie !!}" href="#"><i class="bx bx-trash me-1"></i> Eliminar</a>
                    </div>
                  </div>
                </td>
              </tr>
              <div class="modal" id="valorar{{ $movie->id_movie }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title">Establecer valoración</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <p>Establece la valoración personal para esta película favorita</p>
                              <form action="{{ route('update_valoration',[$movie->id_movie]) }}" method="POST">
                                {{ csrf_field() }}
                                  <input class="form-control" name="valoration" value="{{ $movie->valoration }}" type="number" min="0" max="10" />
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                              <button type="submit" class="btn btn-primary">Guardar Cambos</button>
                          </div>
                              </form>
                        </div>
                    </div>
              </div>

              <div class="modal" id="eliminar{{ $movie->id_movie }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title">Eliminar</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <p>¿Seguro de eliminar esta película de tu lista de favoritos?</p>
                            
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                              <a href="{{ route('delete_movie',[$movie->id_movie]) }}" class="btn btn-danger">Eliminar</a>
                          </div>
                      </div>
                    </div>
              </div>
            
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
