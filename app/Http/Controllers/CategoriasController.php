<?php

namespace App\Http\Controllers;

use App\Categorias;
use Illuminate\Http\Request;
use Session;
use Redirect;
class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias=Categorias::paginate(5);

        //Enviamos la variable dentro del método compact
        return view('categorias.listar', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['nombre'=>'required']);
        Categorias::create($request->all());
        Session::flash('message','Se ha registrado la categoría correctamente');
        return redirect::to('categorias');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function show(Categorias $categorias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria=Categorias::find($id);
        return view('categorias.editar',compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'nombre'=>'required'
      ]);
      //Almacenar los datos en la BD
      $categoria=Categorias::find($id);
      $categoria->update($request->all());
      //Mostrar mensaje
      Session::flash('message','Se ha actualizado la categoría correctamente');
      //Redireccionar al listado de artículos
      return redirect::to('categorias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      /*
        El catch es para controlar las excepciones, en especial, si intentan eliminar
        una categoría que tenga artículos relacionados
      */
      try{
        $categoria=Categorias::find($id);
        $categoria->delete();
        Session::flash('message','Se ha eliminado la categoría correctamente');
        return redirect::to('categorias');
      }catch(\Illuminate\Database\QueryException $e){
        Session::flash('warning','No se pudo eliminar la categoría, verifica que no tenga artículos relacionados ');
        return redirect::to('categorias');
      }

    }
}
