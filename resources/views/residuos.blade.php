@section('title',"Residuos")
@section('subtitle',"Registro de residuos autorizados");

@section('css')
@endsection

@extends('layouts.app')
@section('content')
        <div id="app">
          <div class="row">
            <div class="col-sm-12">
              <h3 class="margin-top-0 margin-bottom-0">Nuevo Residuo</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <input class="form-control" type="text" v-model="name" placeholder="Nombre">
            </div>
            <div class="col-sm-2">
              <select class="form-control">
                <option value="Kilogramos">Kilogramos</option>
                <option value="Litros">Litros</option>
              </select>
            </div>
            <div class="col-sm-2">
              <button class="btn btn-primary btn-raised margin-top-20" v-on:click="addResidue">Guardar</button>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 table-responsive">
              <table class="table table-condensed table-vertical-middle">
                <thead>
                  <tr>
                    <th>Nombre del Residuo</th>
                    <th>Unidad</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="residue in residues">
                    <td>@{{ residue.name }}</td>
                    <td> 
                      @{{ residue.unit }}
                    </td>
                    <td> <button class="btn btn-danger btn-raised">Deshabilitar</button><td>
                  </tr>
                </tbody>
              </table>
              </div>
          </div>
        </div>
@endsection


@section('scripts')
  <script src="{{ asset('js/residuos/residuos.js') }}"></script>
  <script>
    residuos.init();
  </script>
@endsection
