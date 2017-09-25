<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Fabricante;
use App\Vehiculo;

class FabricanteVehiculoController extends Controller {
		public function __construct()
		{
			$this->middleware('auth.basic');
		}
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
				return response()->json(['data' => $fabricante, 'codigo' => 'Error 404', 'controller' => 'FabricanteVehiculoController'], 404);
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
		 public function store(Request $request)
		{
			if (!$request->get('fabricante_id')){
				return response()->json([
					'mensaje' => 'No se recibio ningún fabricante',
					'codigo' => 'N/A',
					'controller' => 'FabricanteVehiculoController'
				], 500);
			}

			$fabricante = Fabricante::find($request->get('fabricante_id'));
			if(!$fabricante){
				return response()->json([
					'mensaje' => 'El fabricante no existe',
					'codigo' => '404',
					'controller' =>
					'FabricanteVehiculoController'
				], 404);
			}

			Vehiculo::create($request->all());
			return response()->json([
				'data' => 'El vehiculo ha sido creado',
				'codigo' => '200',
				'controller' => 'FabricanteVehiculoController'
			], 200) ;
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
