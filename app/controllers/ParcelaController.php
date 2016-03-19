<?php

class ParcelaController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$parcela = Parcela::all();
		return View::make('parcela.index')->with('parcela',$parcela);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('parcela.index');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//get bloque id
		$bloque = Bloque::find(Input::get('id_parcela'));
		$parcela = new Parcela;
		$num_parcela = $bloque->parcelas->max('num_parcela')+1;
		//reglas de validacion (1-5 parcelas)
		$rules = array(
			'num_parcela' => 'integer|between:1,5'
		);
		$messages = array(

		);
		$validator = Validator::make(array(
			'num_parcela' => $num_parcela),
			$rules,$messages);
		if ($validator -> fails()) {
			return Redirect::to('unidad/'.$bloque->unidades->id.'/edit') -> withErrors($validator) -> withInput();
		} else {
			$parcela -> bloques()->associate($bloque);
			$parcela -> num_parcela = $num_parcela;
			$parcela -> baqueano = Input::get('baqueano');
			$parcela -> ayudante = Input::get('ayudante');
			$parcela -> responsable = Input::get('responsable');
			$parcela -> save();
			Session::flash('message','Parcela registrada');
				return Redirect::to('unidad/'.$bloque->unidades->id.'/edit');
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
		$parcela = Parcela::find($id);
		return View::make('parcela.show') -> with('parcela',$parcela);
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
		$parcela = Parcela::find($id);
		return View::make('parcela.edit') -> with('parcela',$parcela);
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
		$parcela = Parcela::find($id);
		$parcela -> save();
		Session::flash('message','Parcela editada');
			return Redirect::to('');
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
		$parcela = Parcela::find(Input::get('parcelas'));
		if ($parcela) {
			# code...
			$parcela -> delete();
			Session::flash('message','Parcela eliminada');
			return Redirect::to('unidad/'.$parcela->bloques->unidades->id.'/edit');
		}else{
			Session::flash('message','Parcela no seleccionada');
			return Redirect::back();
		}
	}


}
