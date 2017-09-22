<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class MiModelo extends Model {
  public function saludar($nombre)
  {
    return 'Hola '.$nombre;
  }
}
