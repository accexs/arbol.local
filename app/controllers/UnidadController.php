<?php

class UnidadController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$unidad=Unidad::all();
		return View::make('unidad.index')->with('unidad',$unidad);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('unidad.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		//validaciones
		$rules = array(
			'name'=>'required',
		);
		$messages = array(
			'name.required'=>'Debe introducir un nombre de Unidad de Producción',
		);

		$validator = Validator::make(Input::all(),$rules,$messages);
		if($validator -> fails()){
			return Redirect::to('unidad')-> withErrors($validator) -> withInput();
		}else{
			//
			//get user id
			$user = User::find(Auth::id());
			$unidad = new Unidad;
			//$unidad -> users()->associate($user);
			$unidad -> nombre = Input::get('name');
			$unidad -> estado = Input::get('estado');
			$unidad -> municipio = Input::get('municipio');
			$unidad -> reserva = Input::get('reserva');
			$unidad -> save();
			Session::flash('message','Unidad de Producción Registrada');
			return Redirect::to('unidad');
			}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$unidad = Unidad::find($id);
		return View::make('unidad.show') -> with('unidad',$unidad);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$unidad = Unidad::find($id);
		//$bloque = Bloque::where('id_unidad','=',$id)->get();
		//return phpversion();
		//return $unidad->bloques;
		return View::make('unidad.edit') -> with('unidad',$unidad);
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
		$unidad = Unidad::find($id);
		$user -> nombre = Input::get('name');
		$unidad -> estado = Input::get('estado');
		$unidad -> municipio = Input::get('municipio');
		$unidad -> reserva = Input::get('reserva');
		$unidad -> save();
		Session::flash('message','Unidad de Producción Editada');
			return Redirect::to('unidad');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($idUnidad)
	{
		//
		$unidad = Unidad::find($idUnidad);
		$unidad -> delete();

		Session::flash('message','Unidad de Producción Eliminada');
			return Redirect::to('unidad');
	}


}
