@extends('articulos.paginaArticulos')

@section('contenido')
  <div class="container mt-3">
    <h1 class="display-5">Editar artículo</h1>

    <form action="{{route('articulos.update',$articulos->id)}}" method="post">
      @csrf
      {{-- Se especifica el método PUT (usado para update) --}}
      @method('PUT')
      <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" class="form-control" placeholder="Nombre del artículo" value="{{$articulos->nombre}}">
      </div>
      <div class="form-group">
        <label for="categoria">Categoría</label>
        <select name="id_categoria" class="form-control">
          <option selected value="{{$articulos->categoria->id}}">{{$articulos->categoria->nombre}}</option>
          <optgroup>
            @foreach ($categorias as $categoria)
              <option {{ old('id_categoria') == $categoria->id ? 'selected' : ''}} value="{{$categoria->id}}">{{$categoria->nombre}}</option>
            @endforeach
          </optgroup>
        </select>
      </div>
      <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" rows="3" placeholder="Descripción del artículo" class="form-control">{{$articulos->descripcion}}</textarea>
      </div>
      <div class="form-group">
        <label for="cantidad">Cantidad</label>
        <input type="number" min="0" name="cantidad" class="form-control" placeholder="0" value="{{$articulos->cantidad}}">
      </div>
      <div class="form-group">
        <label for="precio">Precio</label>
        <input type="number" step="0.01" min="0" name="precio" class="form-control" placeholder="0.00" value="{{$articulos->precio}}">
      </div>
      <input type="submit" class="btn btn-primary" value="Agregar">
    </form>
  </div>
@endsection
