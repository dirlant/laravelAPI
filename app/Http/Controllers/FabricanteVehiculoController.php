<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Fabricante;

class FabricanteVehiculoController extends Controller {
		private $controller = 'fabricante / vehiculo';
		/**
		 * Display a listing of the resource.
		 *
		 * @return Response
		 */
		public function index($id)
		{
			//$all = Fabricante::with('vehiculos')->get(); todos los fabricantes con sus autos
			$fabricante = Fabricante::with(array('vehiculos' => function ($query) use ($id){
        $query->where('fabricante_id', $id);
    	}))->find($id);

			if(!$fabricante){
				return response()->json(['data' => $fabricante, 'codigo' => 'Error 404'], 404);
			}
			return response()->json(['data' => $fabricante], 200);
		}

		/**
		 * Show the form for creating a new resource.
		 *
		 * @return Response
		 */
		public function create($id)
		{
			return "creando vehiculos del fabricante ->$id";
		}

		/**
		 * Store a newly created resource in storage.
		 *
		 * @return Response
		 */
		public function store()
		{
			//
		}

		/**
		 * Display the specified resource.
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function show($idFabricante, $idVehiculo)
		{
			return "mostrando vehiculos del fabricante ->$idFabricante  con del detalle del vehiculo $idVehiculo";
		}

		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function edit($idFabricante, $idVehiculo)
		{
			return "editando el vehiculos $idVehiculo del fabricante ->$idFabricante	";
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function update($id)
		{
			//
		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function destroy($id)
		{
			//
		}


}
