@extends('categorias.paginaCategorias')
@section('contenido')
  <div class="container mt-3">
    <h1 class="display-5">Editar categoría</h1>

    <form action="{{route('categorias.update',$categoria->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" class="form-control" placeholder="Nombre de la categoría" value="{{$categoria->nombre}}">
      </div>
      <input type="submit" class="btn btn-primary" value="Agregar">
    </form>
  </div>
@endsection
