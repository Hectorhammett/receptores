@section('title',"Test")

@section('css')
@endsection

@extends('layouts.app')
@section('content')
        <div class="row">
            <div class="col-sm-12">
              <div id="app">
                <input v-model="newTodo" v-on:keyup.enter="addTodo">
                <ul>
                  <li v-for="todo in todos">
                    <span>@{{ todo.text }}</span>
                    <button v-on:click="removeTodo($index)">X</button>
                  </li>
                </ul>
              </div>
            </div>
        </div>
@endsection


@section('scripts')
  <script src="{{ asset('js/residuos/residuos.js') }}"></script>
@endsection
