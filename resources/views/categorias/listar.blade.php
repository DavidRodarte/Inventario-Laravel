
@extends('categorias.paginaCategorias')

@section('contenido')
  <div class="container mt-3">
    <h1 class="display-5">Listado de categorías</h1>
    @if (Session::has('message'))
       <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif﻿
    @if (Session::has('warning'))
       <div class="alert alert-warning">{{ Session::get('warning') }}</div>
    @endif﻿
    <a href="{{route('categorias.create')}}" class="btn btn-primary float-right mb-2">Agregar</a>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead class="thead-dark">
          <th>ID</th>
          <th>Nombre</th>
          <th></th>
          <th></th>
        </thead>
        <tbody>
           @forelse ($categorias as $categoria)
            <tr>
              <td>{{$categoria->id}}</td>
              <td>{{$categoria->nombre}}</td>
              <td><a href="{{route('categorias.edit', $categoria->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a></td>
              <td>
                <form action="{{route('categorias.destroy', $categoria->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit" onclick="return confirm('Se eliminará la categoria')"><i class="fa fa-trash"></i></button>
                </form>
              </td>
            </tr>
          @empty
            <div class="alert alert-info">No hay categorías</div>
          @endforelse
        </tbody>
      </table>
      {{$categorias->links()}}
    </div>
  </div>
@endsection
