@extends('articulos.paginaArticulos')
@section('contenido')
  <div class="container mt-3">
    <h1 class="display-5">Agregar artículo</h1>

    <form action="{{route('articulos.store')}}" method="post">
      {{--  crsf para añadir el token  --}}
      @csrf
      <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" class="form-control" placeholder="Nombre del artículo">
      </div>
      <div class="form-group">
        <label for="categoria">Categoría</label>
        <select name="id_categoria" class="form-control">
          @foreach ($categorias as $categoria)
            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" rows="3" placeholder="Descripción del artículo" class="form-control"></textarea>
      </div>
      <div class="form-group">
        <label for="cantidad">Cantidad</label>
        <input type="number" min="0" name="cantidad" class="form-control" placeholder="0">
      </div>
      <div class="form-group">
        <label for="precio">Precio</label>
        <input type="number" step="0.01" min="0" name="precio" class="form-control" placeholder="0.00">
      </div>
      <input type="submit" class="btn btn-primary" value="Agregar">
    </form>
  </div>
@endsection
