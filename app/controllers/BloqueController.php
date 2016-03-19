<?php

class BloqueController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$bloque = Bloque::all();
		return View::make('bloque.index')->with('bloque',$bloque);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('bloque.index');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//reglas de validacion bloques
		$rules = array(
			'num_bloque'=>'required|integer|between:1,999',
		);
		$messages = array(
			'num_bloque.required' => 'Es necesario especificar un número de Bloque',
			'num_bloque.integer' => 'El Bloque debe ser un número entero' 
		);
		$validator = Validator::make(Input::all(),$rules,$messages);
		if ($validator -> fails()) {
			return Redirect::to('unidad/'.Unidad::find(Input::get('id_bloque'))->id.'/edit') -> withErrors($validator) -> withInput();
		} else {

		}
		$unidad = Unidad::find(Input::get('id_bloque'));
		$bloque = new Bloque;
		$bloque -> unidades()->associate($unidad);
		$bloque -> num_bloque = Input::get('num_bloque');
		$bloque -> save();
		Session::flash('message','Bloque registrado');
		return Redirect::to('unidad/'.$bloque->unidades->id.'/edit');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($idBloque)
	{
		//
		$bloque = Bloque::find($idBloque);
		return View::make('bloque.show') -> with('bloque',$bloque);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($idBloque)
	{
		//
		$bloque = Bloque::find($idBloque);
		return View::make('bloque.edit') -> with('bloque',$bloque);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($idBloque)
	{
		//
		$bloque = Bloque::find($idBloque);
		$bloque -> save();
		Session::flash('message','Bloque editado');
			return Redirect::to('');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($idBloque)
	{
		//
		$bloque = Bloque::find($idBloque);
		$bloque -> delete();

		Session::flash('message','Bloque eliminado');
		return Redirect::to('unidad/'.$bloque->unidades->id.'/edit');
	}


}
