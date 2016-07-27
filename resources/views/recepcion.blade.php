@section('title',"Recepcion")
@section('subtitle',"Punto de entrada")

@section('css')
 <link href="{{ asset('assets/select/css/select2.css') }}" rel="stylesheet" />
@endsection

@extends('layouts.app')
@section('content')
  <div id="app">
    <div class="row">
      <form id="form-recepcion" action="{{ asset('newArribal') }}">
        <div class="col-sm-6">
          <h3 class="main-title">Información del manifiesto</h3>
          <div class="form-group">
            <input placeholder="Número de manifiesto" name="noManifiesto" class="form-control" type="number"/>
          </div>
          <div class="form-group">
            <select class="form-control" name="generador">
              
            </select>
          </div>
          <div class="form-group">
            <select class="form-control" name="generador">
              
            </select>
          </div>
          <div class="form-group">
            <select class="form-control" name="generador">
              
            </select>
          </div>
          <h3 class="main-title">Residuos en el manifiesto</h3>
          <div class="form-group">
            <select class="form-control" name="generador">
              
            </select>
          </div>
          <div class="form-group">
            <button class="btn btn-primary btn-raised">Guardar</button>
            <button class="btn btn-default btn-raised">Agregar Residuos</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection


@section('scripts')
  <script src="{{ asset('assets/select2/js/select2.js') }}"></script>
  <script src="{{ asset('js/recepcion/recepcion.js') }}"></script>
@endsection
