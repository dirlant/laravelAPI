<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vehiculo;

class VehiculoController extends Controller {
		public function __construct()
		{
			$this->middleware('auth.basic');
		}
		/**
		 * Display a listing of the resource.
		 *
		 * @return Response
		 */
		public function index()
		{
			$vehiculo = Vehiculo::All();
			if(!$vehiculo){
				return response()->json(['data' => $vehiculo, 'codigo' => 'Error 404'], 404);
			}
			return response()->json(['data' => $vehiculo], 200) ;
		}

		/**
		 * Show the form for creating a new resource.
		 *
		 * @return Response
		 */
		public function create()
		{
			return 'Mostrando el menu para crear un vehiculo';
		}

		/**
		 * Store a newly created resource in storage.
		 *
		 * @return Response
		 */
		public function store()
		{

		}

		/**
		 * Display the specified resource.
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function show($id)
		{
			$vehiculo = Vehiculo::find($id);
			if(!$vehiculo){
				return response()->json(['data' => $vehiculo, 'codigo' => 'Error 404'], 404);
			}
			return response()->json(['data' => $vehiculo], 200);
		}

		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function edit($id)
		{
			return "editando fabricante->$id";
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function update($id)
		{
			return "actualizando vehiculo->$id";
		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function destroy($id)
		{
			return "eliminando vehiculo->$id";
		}

}
