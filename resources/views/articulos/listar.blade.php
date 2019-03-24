{{--
Este archivo blade extiende de su página padre (paginaArticulos)
con @extends('carpeta.nombreDelArchivo')

con la directiva @section('nombreYield') ... @endsection
cargaremos el contenido dentro del yield de la página padre
--}}

@extends('articulos.paginaArticulos')

@section('contenido')
  <div class="container mt-3">
    <h1 class="display-5">Listado de artículos</h1>
    @if (Session::has('message'))
       <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif﻿
    <a href="{{route('articulos.create')}}" class="btn btn-primary float-right mb-2">Agregar</a>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead class="thead-dark">
          <th>ID</th>
          <th>Nombre</th>
          <th>Descripción</th>
          <th>Categoría</th>
          <th>Precio</th>
          <th>Cantidad</th>
          <th></th>
          <th></th>
        </thead>
        <tbody>
          {{--
              Forelse es como un foreach, pero nos permite más control cuando no tiene datos
          --}}
          @forelse ($articulos as $articulo)
            <tr>
              <td>{{$articulo->id}}</td>
              <td>{{$articulo->nombre}}</td>
              <td>{{$articulo->descripcion}}</td>
              <td>{{$articulo->categoria->nombre}}</td>
              <td>${{$articulo->precio}}</td>
              <td>{{$articulo->cantidad}}</td>
              <td><a href="{{route('articulos.edit', $articulo->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a></td>
              <td>
                <form action="{{route('articulos.destroy', $articulo->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit" onclick="return confirm('Se eliminará el artículo')"><i class="fa fa-trash"></i></button>
                </form>
              </td>
            </tr>
          @empty
            <div class="alert alert-info">No hay artículos</div>
          @endforelse
        </tbody>
      </table>
    </div>

    {{$articulos->links()}}
  </div>
@endsection
