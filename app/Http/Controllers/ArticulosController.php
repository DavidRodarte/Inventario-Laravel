<?php

namespace App\Http\Controllers;

use App\Articulos;
use Illuminate\Http\Request;
use Session;
use Redirect;

class ArticulosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      /*
        *Para agregar paginación podemos usar paginate(n) para limitiar los registros mostrados por página,
        con links() en blade podemos obtener la paginación
        *Existen otros métodos como orderBy
      */
        $articulos = Articulos::orderBy('id','DESC')->paginate(5);
        return view('articulos.listar', compact('articulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = \App\Categorias::get();
        return view('articulos.crear',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //Validar que los campos no estén vaciós
        $request->validate([
          'nombre'=>'required',
          'id_categoria'=>'required',
          'descripcion'=>'required',
          'cantidad'=>'required',
          'precio'=>'required'
        ]);
        //Almacenar los datos en la BD
        Articulos::create($request->all());
        //Mostrar mensaje
        Session::flash('message','Se ha registrado el artículo correctamente');
        //Redireccionar al listado de artículos
        return redirect::to('articulos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function show(Articulos $articulos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Articulos  $articulos
     * @return \Illuminate\Http\Response
     */

     /*
        Tuve que cambiar el modelo por una variable id ya que pasando el modelo como
        parámetro no devolvía nada
     */
    public function edit($id)
    {
        $articulos=Articulos::find($id);
        $categorias = \App\Categorias::get();
        return view('articulos.editar',compact('articulos','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Articulos  $articulos
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
      $request->validate([
        'nombre'=>'required',
        'id_categoria'=>'required',
        'descripcion'=>'required',
        'cantidad'=>'required',
        'precio'=>'required'
      ]);
      //Almacenar los datos en la BD
      $articulo=Articulos::find($id);
      $articulo->update($request->all());
      //Mostrar mensaje
      Session::flash('message','Se ha actualizado el artículo correctamente');
      //Redireccionar al listado de artículos
      return redirect::to('articulos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo=Articulos::find($id);
        $articulo->delete();
        Session::flash('message','Se ha eliminado el artículo correctamente');
        return redirect::to('articulos');
    }
}
