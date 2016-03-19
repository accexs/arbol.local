<?php

class InvforController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$arboles=Arbol::all();

		return View::make('invfor.index')->with('bloques',$arboles);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('invfor.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//econtrar especie por cod de especie
		$especie = Especie::where('cod_especie','like',Input::get('cod_especie'))->first();

		Validator::extend('dap', function($attribute, $value, $parameters)
		{
			$especie = Especie::where('cod_especie','like',Input::get('cod_especie'))->firstorfail();
			if($especie->tipo_especie=='dura'){
				if($value>=50){
					return true;
				}
			}
			if($especie->tipo_especie=='semidura'){
				if($value>=60){
					return true;
				}
			}
			if($especie->tipo_especie=='blanda'){
				if($value>=70){
					return true;
				}
			}
			return false;
		});

		//
		Validator::extend('val_num_arbol',function($attribute, $value, $parameters){
			$unidad = Unidad::find(Input::get('unidades'))->firstorfail();
			$bloques = $unidad->bloques()->get();
			foreach ($bloques as $bloque) {
				# code...
				if ($bloque -> id == Input::get('bloques')) {
					//$bloque_aux = $bloque;
					$parcelas = $bloque->parcelas;
					foreach ($parcelas as $parcela) {
						# code...
						if ($parcela -> id == Input::get('parcelas')) {
							//$val = $parcela;
							$arboles = $parcela->arboles;
							foreach ($arboles as $arbol) {
								# code...
								if (Input::get('tipoarbol')=='normal'){
									$arbolts = Tnormal::where('id_arbol','=',$arbol->id)->get();
									foreach ($arbolts as $arbolt) {
										# code...
										if($arbolt->num_arbol==Input::get('num_arbol')){
											return false;
											//return "false(no inserta) y # ".$arbolt->num_arbol."input: ".Input::get('num_arbol');
										}
									}
								}
								if (Input::get('tipoarbol')=='candidato'){
									$arbolts = Tsemillero::where('id_arbol','=',$arbol->id)->get();
									foreach ($arbolts as $arbolt) {
										# code...
										if($arbolt->num_arbol==Input::get('num_arbol')){
											return false;
											//return "false(no inserta) y # ".$arbolt->num_arbol."input: ".Input::get('num_arbol');
										}
									}		
								}
							}
						}
					}
				}
			}
			return true;
			//return "true(inserta)  y # ".$arbolt->num_arbol."input: ".Input::get('num_arbol');
		});

		//validaciones
$rules = array(
	'unidades'=>'required',
	'num_arbol'=>'required|val_num_arbol',
			//'responsable'=>'alpha|min:2|max:50',
			//'baqueano'=>'alpha|min:2|max:50',
	'bloques'=>'required|integer|between:1,1000',
	'parcelas'=>'required|integer',
			//'ayudante'=>'alpha|min:2|max:50',
	'tipoarbol'=>'required',
	'cod_especie'=>'exists:especies|required|alpha_dash|min:1|max:10',
	'cap'=>'sometimes|numeric|min:1|max:500',
	'dap'=>'sometimes|numeric|min:1|max:500|dap',
	'fuste'=>'numeric|min:1|max:500',
	'htotal'=>'numeric|min:1|max:500',
	'norte'=>'digits:6',
	'este'=>'digits:6',
	'calfuste'=>'required',
	'vitalidad'=>'required',
	'observaciones'=>'alpha_dash|max:500',
	);
$messages = array(
			//unidad de produccion
	'unidades.required'=>'Es necesario elegir una Unidad de Producción',
			//numero de arbol
	'num_arbol.required'=>'Es necesario asignar un número de árbol',
	'num_arbol.val_num_arbol'=>'El número de árbol está repetido',
			//bloque
	'bloques.required'=>'Es necesario elegir Bloque',
	'bloques.integer'=>'El Bloque debe ser un número',
			//parcela
	'parcelas.required'=>'Es necesario elegir Parcela',
	'parcelas.integer'=>'La Parcela debe ser un número',
			//tipo arbol
	'tipoarbol.required'=>'Es necesario elegir el tipo de árbol',
			//codigo especie
	'cod_especie.exists' => 'Código de especie no encontrado',
	'cod_especie.required' => 'El Código de especie es obligatorio.',
	'cod_especie.alpha_dash'=>'El Código de especie solo puede contener letras, numeros y guiones.',
	'cod_especie.min' => 'El tamaño mínimo para el Código de especie son :min letras.',
	'cod_especie.max' => 'El tamaño máximo para el Código de especie son :max letras.',
			//cap
	'cap.numeric'=>'CAP debe ser un número',
			//dap
	'dap.numeric'=>'DAP debe ser un número',
	'dap.dap'=>'Especies DURAS tienen DAP >= 50 cm, Especies SEMIDURAS tienen DAP entre 60 y 70 cm, Especies BLANDAS tienen DAP > 70 cm',
			//fuste
	'fuste.numeric'=>'La altura de fuste (h Fuste) debe ser un número',
			//htotal
	'htotal.numeric'=>'La altura total (H Total) debe ser un número',
			//norte
	'norte.digits'=>'Coordenada NORTE debe ser un número de 6 digitos',
			//este
	'este.digits'=>'Coordenada ESTE debe ser un número de 6 digitos',
			//calidad fuste
	'calfuste.required'=>'Es necesario elegir Calidad de Fuste',
			//vitalidad
	'vitalidad.required'=>'Es necesario elegir Vitalidad del árbol',
			//observaciones
	'responsable.max'=>'Las observaciones solo pueden tener hasta :max caracteres',
	);
$validator = Validator::make(Input::all(),$rules,$messages);
if ($validator -> fails()) {
	return Redirect::to('invfor/create') -> withErrors($validator) -> withInput();
} else {
	$arbol = new Arbol;
			//encontrar unidad de produccion
			//$unidad = Unidad::find(Input::get('unidades'));
	$arbol -> especies()->associate($especie);
	$arbol -> calidad_fuste = Input::get('calfuste');
	$arbol -> vitalidad = Input::get('vitalidad');
	$arbol -> cap = Input::get('cap');
	$arbol -> dap = Input::get('dap');
	$arbol -> coordenadas = ('N'.Input::get('norte').' | '.'E'.Input::get('este'));
	$arbol -> id_parcela = Input::get('parcelas');
	$arbol -> save();

			//
	if (Input::get('tipoarbol')=='normal'){
		$tnormal = new Tnormal;
		$tnormal -> arboles()->associate($arbol);
		$tnormal -> hfuste = Input::get('fuste');
				//# arbol
		$tnormal -> num_arbol = Input::get('num_arbol');
		$tnormal -> save();
	}
	if (Input::get('tipoarbol')=='candidato'){
		$tcandi = new Tsemillero;
		$tcandi -> arboles()->associate($arbol);
		$tcandi -> htotal = Input::get('htotal');
				//# arbol
		$tcandi -> num_arbol = Input::get('num_arbol');
		$tcandi -> save();
	}


			//
	$parcela = Parcela::find(Input::get('parcelas'));
	$parcela -> baqueano = Input::get('baqueano');
	$parcela -> ayudante = Input::get('ayudante');
	$parcela -> responsable = Input::get('responsable');

	$parcela -> save();

	Session::flash('message','Árbol registrado en el Inventario Forestal');

	return Redirect::to('invfor/create');
}

}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		//
		$unidad = Unidad::find(Input::get('unidades'))->firstorfail();
			$bloques = $unidad->bloques;
			foreach ($bloques as $bloque) {
				# code...
				if ($bloque -> id == Input::get('bloques')) {
					//$bloque_aux = $bloque;
					$parcelas = $bloque->parcelas;
					foreach ($parcelas as $parcela) {
						# code...
						if ($parcela -> id == Input::get('parcelas')) {
							//$val = $parcela;
							$arboles = $parcela->arboles;
							foreach ($arboles as $arbol) {
								# code...
								if (Input::get('tipoarbol')=='normal'){
									$arbolts = Tnormal::where('id_arbol','=',$arbol->id)->get();
									foreach ($arbolts as $arbolt) {
										# code...
										if($arbolt->num_arbol==Input::get('num_arbol')){
											//return false;
											return "false(no inserta) y # ".$arbolt->num_arbol."input: ".Input::get('num_arbol');
										}
									}
								}
								if (Input::get('tipoarbol')=='candidato'){
									$arbolts = Tsemillero::where('id_arbol','=',$arbol->id)->get();
									foreach ($arbolts as $arbolt) {
										# code...
										if($arbolt->num_arbol==Input::get('num_arbol')){
											//return false;
											return "false(no inserta) y # ".$arbolt->num_arbol."input: ".Input::get('num_arbol');
										}
									}		
								}
							}
						}
					}
				}
			}
			//return true;
			return "true(inserta)  y # ".$arbolt->num_arbol."input: ".Input::get('num_arbol');
		
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
		return View::make('invfor.edit');

	}

	public function showarbol(){
		//
		$coordenadas = 'N'.Input::get('norte').' | '.'E'.Input::get('este');
		$arbol = Arbol::where('coordenadas','like',$coordenadas)->first();
		//return $arbol;
		if (! $arbol) {
			Session::flash('message', 'Árbol no encontrado');
			return Redirect::to('invfor/%7Binvfor%7D/edit');
		}else{
			if(Tsemillero::where('id_arbol','=',$arbol->id)->count()) 
			{
				$tipo = Tsemillero::where('id_arbol','=',$arbol->id)->first();
			}else{
				$tipo =	Tnormal::where('id_arbol','=',$arbol->id)->first();
			}
			return View::make('arbol.show')->with('arbol',$arbol)->with('tipo',$tipo);
		}
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
		$arbol = Arbol::find($id);
		$arbol -> delete();
		Session::flash('message', 'Árbol eliminado');
		return Redirect::to('invfor/#/edit');
	}


}
