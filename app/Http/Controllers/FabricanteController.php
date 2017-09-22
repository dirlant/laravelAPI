<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Fabricante;
use Illuminate\Http\Request;

class FabricanteController extends Controller {

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
		$fabricante = Fabricante::All();
		if(!$fabricante){
			return response()->json(['data' => $fabricante, 'codigo' => 'Error 404', 'controller' => 'FabricanteController'], 404);
		}
		return response()->json(['data' => $fabricante], 200) ;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return 'Mostrando el menu para crear un fabricante';
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		return response()->json(['data' => 'usted tiene permiso', 'codigo' => 200, 'controller' => 'FabricanteController'], 404);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$fabricante = Fabricante::find($id);
		if(!$fabricante){
			return response()->json(['data' => $fabricante, 'codigo' => 'Error 404','controller' => 'FabricanteController'], 404);
		}
		return response()->json(['data' => $fabricante], 200);
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
		return "actualizando fabricante->$id";
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return "eliminando fabricante->$id";
	}

}
