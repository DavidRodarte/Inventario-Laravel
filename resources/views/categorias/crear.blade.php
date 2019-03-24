@extends('categorias.paginaCategorias')
@section('contenido')
  <div class="container mt-3">
    <h1 class="display-5">Agregar categoría</h1>

    <form action="{{route('categorias.store')}}" method="post">
      @csrf
      <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" class="form-control" placeholder="Nombre de la categoría">
      </div>
      <input type="submit" class="btn btn-primary" value="Agregar">
    </form>
  </div>
@endsection
