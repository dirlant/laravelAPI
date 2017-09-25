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
		 public function store(Request $req, $id)
		{
			if (!$req){
				return response()->json([
					'mensaje' => 'No se recibio ningún fabricante',
					'codigo' => 'N/A',
					'controller' => 'FabricanteVehiculoController'
				], 500);
			}

			$fabricante = Fabricante::find($id);
			if(!$fabricante){
				return response()->json([
					'mensaje' => 'El fabricante no existe',
					'codigo' => '404',
					'controller' =>
					'FabricanteVehiculoController'
				], 404);
			}

			Vehiculo::create([
				'color' => $req->get('color'),
				'cilindraje' => $req->get('cilindraje'),
				'potencia' => $req->get('potencia'),
				'peso' => $req->get('peso'),
				'fabricante_id' => $id
			]);

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
		public function update(Request $req, $idFabricante, $idVehiculo)
		{
			$metodo = $req->method();

			// Buscando fabricante
			$fabricante = Fabricante::find($idFabricante);
			if (!$fabricante) {
				return response()->json([
					'error' => 'No se encontraron resultados del fabricante',
					'controller' => 'FabricanteController'
				], 404);
			}

			// Buscando vehiculo del fabricante
			$vehiculo = $fabricante->vehiculos()->find($idVehiculo);
			if (!$vehiculo) {
				return response()->json([
					'error' => 'No se encontraron del vehiculo asociado',
					'controller' => 'FabricanteController'
				], 404);
			}


			if ($metodo === 'PATCH') {
				if ($req->get('color') == ''){
					return response()->json([
						'error' => 'no se recibieron parametros',
						'controller' => 'FabricanteController'
					], 404);
				}

				$vehiculo->color = $req->get('color');
				$vehiculo->save();

				return response()->json([
					'data'=> $vehiculo,
					'status' => 'ok',
					'controller' => 'FabricanteController'
				], 404);
			}
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
