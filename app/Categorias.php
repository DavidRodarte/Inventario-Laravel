<?php
/*
    Modelo de categorías, creado con:
    php artisan make:model Categorias -a
    (-a para generar migration, controller y resource)
*/
namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $guarded= [];
    protected $hidden = [];

    public function articulos(){
      return $this->hasMany('App\Articulos');
    }
}
