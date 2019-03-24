<?php
/*
    Modelo de artículos, creado con:
    php artisan make:model Articulos -a
    (-a para generar migration, controller y resource) o -mcr
*/
namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulos extends Model
{
  protected $guarded= [];
    protected $hidden = [];
  /*
    Consultar la categoría de cada artículo
  */
  public function categoria(){
    //Es necesario especificar el id de la relación (id_categoria)
    return $this->belongsTo('App\Categorias','id_categoria');
  }
}
