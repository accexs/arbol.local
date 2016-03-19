<?php

class ArbolController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//get arboles
		$arboles=Especie::all();
		
		return View::make('arbol.index')->with('arboles',$arboles);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('arbol.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		Validator::extend('alpha_spaces', function($attribute, $value)
		{
    		return preg_match('/^[\pL\s]+$/u', $value);
		});

		//validaciones
		$rules = array(
			'cod_especie'=>'required|alpha_spaces|min:1|max:10',
			'nombre_vulgar'=>'alpha_spaces|min:1|max:50',
			'nombre_cient'=>'alpha_spaces|min:1|max:50',
			'tipo_especie'=>'alpha_spaces|min:1|max:50',
			'familia'=>'alpha_spaces|min:1|max:50',
			'cod_numerico'=>'numeric|required',
			//'calidad_fuste'=>'alpha|max:1',
			//'vitalidad'=>'alpha|max:1',
			//'coordenadas'=>'numeric|max:6'
		);
		$messages = array(
			//codigo numerico
			'cod_numerico.numeric' => 'El código numérico debe contener solo números',
			'cod_numerico.required' => 'El código númerico es obligatorio',
			//codigo especie
			'cod_especie.required' => 'Código de especie obligatorio.',
			'cod_especie.alpha_spaces'=>'Código de especie solo puede contener letras, números y guiones.',
			'cod_especie.min' => 'El tamaño mínimo para el Código de especie son :min letras.',
			'cod_especie.max' => 'El tamaño máximo para el Código de especie son :max letras.',
			//nombre vulgar
			'nombre_vulgar.alpha_spaces'=>'El Nombre vulgar solo puede contener letras, números y guiones.',
			'nombre_vulgar.min' => 'El tamaño mínimo para el Nombre vulgar son :min letras.',
			'nombre_vulgar.max' => 'El tamaño máximo para el Nombre vulgar son :max letras.',
			//nombre centifico
			'nombre_cient.alpha_spaces'=>'El Nombre científico solo puede contener letras, números y guiones.',
			'nombre_cient.min' => 'El tamaño mínimo para el Nombre científico son :min letras.',
			'nombre_cient.max' => 'El tamaño máximo para el Nombre científico son :max letras.',
			//familia
			'familia.alpha_spaces'=>'El Nombre de familia solo puede contener letras, números y guiones.',
			'familia.min' => 'El tamaño mínimo para el Nombre de familia son :min letras.',
			'familia.max' => 'El tamaño máximo para el Nombre de familia son :max letras.',
		);
		$validator = Validator::make(Input::all(),$rules,$messages);
		if ($validator -> fails()) {
			return Redirect::to('arbol/create') -> withErrors($validator) -> withInput();
		} else {
			//
			//store
			$arbol = new Especie;
			$arbol -> cod_especie = Input::get('cod_especie');
			
			$arbol -> nombre_vulgar = Input::get('nombre_vulgar');
			$arbol -> nombre_cientifico = Input::get('nombre_cient');
			$arbol -> tipo_especie = Input::get('especie');
			$arbol -> familia = Input::get('familia');
			$arbol -> cod_numerico = Input::get('cod_numerico');
			//$arbol -> calidad_Fuste = Input::get('calFuste');
			//$arbol -> vitalidad = Input::get('vitalidad');
			//$arbol -> cap = Input::get('cap');
			//$arbol -> dap = Input::get('dap');
			//$arbol -> coordenadas = Input::get('coordenadas');
			//$arbol -> idTnormal = Input::get('idTnormal');
			//$arbol -> idTsemillero = Input::get('idTsemillero');
			$arbol -> save();

			Session::flash('message','Registro de árbol exitoso');
			return Redirect::to('arbol');
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
		$arbol = Especie::find($id);
		return View::make('arbol.show')->with('arbol',$arbol);
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
		$arbol = Especie::find($id);
		return View::make('arbol.edit')->with('arbol',$arbol);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		Validator::extend('alpha_spaces', function($attribute, $value)
		{
    		return preg_match('/^[\pL\s]+$/u', $value);
		});

		//validaciones
		$rules = array(
			'cod_especie'=>'required|alpha_spaces|min:1|max:10',
			'nombre_vulgar'=>'alpha_spaces|min:1|max:50',
			'nombre_cient'=>'alpha_spaces|min:1|max:50',
			'tipo_especie'=>'alpha_spaces|min:1|max:50',
			'familia'=>'alpha_spaces|min:1|max:50',
			'cod_numerico'=>'numeric|required',
			//'calidad_fuste'=>'alpha|max:1',
			//'vitalidad'=>'alpha|max:1',
			//'coordenadas'=>'numeric|max:6'
		);
		$messages = array(
			//codigo numerico
			'cod_numerico.numeric' => 'El código numérico debe contener solo números',
			'cod_numerico.required' => 'El código númerico es obligatorio',
			//codigo especie
			'cod_especie.required' => 'Código de especie obligatorio.',
			'cod_especie.alpha_spaces'=>'Código de especie solo puede contener letras, números y guiones.',
			'cod_especie.min' => 'El tamaño mínimo para el Código de especie son :min letras.',
			'cod_especie.max' => 'El tamaño máximo para el Código de especie son :max letras.',
			//nombre vulgar
			'nombre_vulgar.alpha_spaces'=>'El Nombre vulgar solo puede contener letras, números y guiones.',
			'nombre_vulgar.min' => 'El tamaño mínimo para el Nombre vulgar son :min letras.',
			'nombre_vulgar.max' => 'El tamaño máximo para el Nombre vulgar son :max letras.',
			//nombre centifico
			'nombre_cient.alpha_spaces'=>'El Nombre científico solo puede contener letras, números y guiones.',
			'nombre_cient.min' => 'El tamaño mínimo para el Nombre científico son :min letras.',
			'nombre_cient.max' => 'El tamaño máximo para el Nombre científico son :max letras.',
			//familia
			'familia.alpha_spaces'=>'El Nombre de familia solo puede contener letras, números y guiones.',
			'familia.min' => 'El tamaño mínimo para el Nombre de familia son :min letras.',
			'familia.max' => 'El tamaño máximo para el Nombre de familia son :max letras.',
		);
		$validator = Validator::make(Input::all(),$rules,$messages);
		if ($validator -> fails()) {
			//http://arbol.local/arbol/1/edit
			return Redirect::to('arbol/'.$id.'/edit') -> withErrors($validator) -> withInput();
		} else {
			//
			$arbol = Especie::find($id);
			$arbol -> cod_especie = Input::get('cod_especie');
			$arbol -> cod_numerico = Input::get('cod_numerico');
			$arbol -> nombre_vulgar = Input::get('nombre_vulgar');
			$arbol -> nombre_cientifico = Input::get('nombre_cientifico');
			$arbol -> tipo_especie = Input::get('tipo_especie');
			$arbol -> familia = Input::get('familia');
			//$arbol -> calidad_fuste = Input::get('calFuste');
			//$arbol -> vitalidad = Input::get('vitalidad');
			//$arbol -> cap = Input::get('cap');
			//$arbol -> dap = Input::get('dap');
			//$arbol -> coordenadas = Input::get('coordenadas');
			//$arbol -> idTnormal = Input::get('idTnormal');
			//$arbol -> idTsemillero = Input::get('idTsemillero');
			$arbol -> save();

			Session::flash('message','Modificación de árbol exitosa');
			return Redirect::to('arbol');
		}
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
		$arbol = Especie::find($id);
		$arbol -> delete();
		Session::flash('message', 'Árbol eliminado satisfactoriamente');
		return Redirect::to('arbol');
	}


}
