<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Vehiculo;
use App\Fabricante;
use Faker\Factory as Faker;

/**
 *
 */
class VehiculoSeeder extends Seeder
{

  public function run()
  {
    $faker = Faker::create();
    $cantidad = Fabricante::all()->count();
    for ($i=0; $i < $cantidad; $i++)
    {
      Vehiculo::create
      ([
        'color' => $faker->safeColorName(),
        'cilindraje' => $faker->randomFloat(),
        'potencia' => $faker->randomNumber(),
        'peso' => $faker->randomFloat(),
        'fabricante_id' => $faker->numberBetween(1, $cantidad)
      ]);
    }
  }
}
