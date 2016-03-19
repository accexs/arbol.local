<?php

class consultasController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
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
	public function show($id)
	{
		//
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

 public function exportar(){
  //if (Request::ajax()) {
  $data = json_decode(json_encode(Input::get('data')),true);
  Excel::create('exportacion-'.date('l jS \of F Y h:i:s A'), function($excel) use($data) {
    $excel->sheet('resultado', function($sheet) use($data) {
      $sheet->fromArray($data);
    });
  })->store('xls',storage_path('reportes'));
}

public function consultarInv()
{
  return View::make('consultar');
}

public function doConsulta($con){
		//
  switch ($con) {
    case 1:
        		//
    $titulo = '1.LISTADO GENERAL DE ÁRBOLES APROVECHABLES.';
    $arboles = DB::table('unidades')
    ->select(
      DB::raw('unidades.nombre as "nombre_unidad",
        unidades.id as "id_unidad",
        bloques.num_bloque,
        bloques.id as "id_bloque",
        parcelas.num_parcela,
        parcelas.id as "id_parcela",
        arboles.id as "id_arbol",
        arboles.cap as "cap",
        arboles.dap as "dap",
        arboles.calidad_fuste as "calidad",
        arboles.vitalidad as "vitalidad",
        (select tnormal.hfuste from tnormal where tnormal.id_arbol = arboles.id) as "altura",
        (select tnormal.num_arbol from tnormal where tnormal.id_arbol = arboles.id) as "num_arbol",
        (select nombre_vulgar 
          from especies where especies.id=arboles.id_especie) as "especie",
      (select cod_especie 
       from especies where especies.id=arboles.id_especie) as "cod_especie",
      (select cod_numerico 
       from especies where especies.id=arboles.id_especie) as "cod_numerico"
      ')
      )
    ->join('bloques','unidades.id','=','bloques.id_unidad')
    ->join('parcelas','bloques.id','=','parcelas.id_bloque')
    ->join('arboles','parcelas.id','=','arboles.id_parcela')
    ->join('especies','arboles.id_especie','=','especies.id')
    ->join('tnormal','arboles.id','=','tnormal.id_arbol')
    ->orderBy('unidades.nombre','asc')
    ->get();
    return View::make('resultado')->with('arboles',$arboles)->with('titulo',$titulo);
    break;
    case 2:
		        //
    $titulo = '2.LISTADO GENERAL DE ÁRBOLES PADRES.';
    $arboles = DB::table('unidades')
    ->select(
      DB::raw('unidades.nombre as "nombre_unidad",
        unidades.id as "id_unidad",
        bloques.num_bloque,
        bloques.id as "id_bloque",
        parcelas.num_parcela,
        parcelas.id as "id_parcela",
        arboles.id as "id_arbol",
        arboles.cap as "cap",
        arboles.dap as "dap",
        arboles.calidad_fuste as "calidad",
        arboles.vitalidad as "vitalidad",
        (select tcandi.htotal from tcandi where tcandi.id_arbol = arboles.id) as "altura",
        (select tcandi.num_arbol from tcandi where tcandi.id_arbol = arboles.id) as "num_arbol",
        (select nombre_vulgar 
          from especies where especies.id=arboles.id_especie) as "especie",
      (select cod_especie 
       from especies where especies.id=arboles.id_especie) as "cod_especie",
      (select cod_numerico 
       from especies where especies.id=arboles.id_especie) as "cod_numerico"
      ')
      )
    ->join('bloques','unidades.id','=','bloques.id_unidad')
    ->join('parcelas','bloques.id','=','parcelas.id_bloque')
    ->join('arboles','parcelas.id','=','arboles.id_parcela')
    ->join('especies','arboles.id_especie','=','especies.id')
    ->join('tcandi','arboles.id','=','tcandi.id_arbol')
    ->orderBy('unidades.nombre','asc')
    ->get();
    return View::make('resultado')->with('arboles',$arboles)->with('titulo',$titulo);
				/*$arboles = DB::table('unidades')
                     ->select(
                     	DB::raw('unidades.nombre as "nombre_unidad",
                     		unidades.id as "id_unidad",
                     		bloques.num_bloque,
                     		bloques.id as "id_bloque",
                     		parcelas.num_parcela,
                     		parcelas.id as "id_parcela",
                     		arboles.id as "id_arbol",
                     		arboles.dap as "dap",
                     		(select tnormal.hfuste from tnormal where tnormal.id_arbol = arboles.id) as "altura",
                     		(select nombre_vulgar 
							from especies where especies.id=arboles.id_especie) as "especie"')
                     	)
                     ->join('bloques','unidades.id','=','bloques.id_unidad')
                     ->join('parcelas','bloques.id','=','parcelas.id_bloque')
                     ->join('arboles','parcelas.id','=','arboles.id_parcela')
                     ->orderBy('unidades.nombre','asc')
                     ->get();
                     return View::make('resultado')->with('arboles',$arboles)->with('titulo',$titulo);*/
                     break;
                     case 3:
		        //
                     $titulo = '3.NÚMERO DE ÁRBOLES POR BLOQUE SEGÚN ESPECIES.';
                     $arboles = DB::table('unidades')
                     ->select(
                     	DB::raw('unidades.nombre as "nombre_unidad",
                     		unidades.id as "id_unidad",
                     		bloques.num_bloque,
                     		bloques.id as "id_bloque",
                     		parcelas.num_parcela,
                     		parcelas.id as "id_parcela",
                     		arboles.id as "id_arbol",
                     		arboles.cap as "cap",
                     		arboles.dap as "dap",
                     		arboles.calidad_fuste as "calidad",
                     		arboles.vitalidad as "vitalidad",
                     		(select nombre_vulgar 
                          from especies where especies.id=arboles.id_especie) as "especie",
                      (select cod_especie 
                        from especies where especies.id=arboles.id_especie) as "cod_especie",
                      (select cod_numerico 
                        from especies where especies.id=arboles.id_especie) as "cod_numerico",
                      (select count(arboles.id_especie) 
                        from especies where especies.id=arboles.id_especie) as "contador"
')
)
->join('bloques','unidades.id','=','bloques.id_unidad')
->join('parcelas','bloques.id','=','parcelas.id_bloque')
->join('arboles','parcelas.id','=','arboles.id_parcela')
->join('especies','arboles.id_especie','=','especies.id')
->orderBy('bloques.num_bloque','asc')
->GroupBy('especies.nombre_vulgar')
->get();
return View::make('resultado')->with('arboles',$arboles)->with('titulo',$titulo);
		    /*$titulo = '3.Volumen MARN por parcela y bloque según especies.';
				$arboles = DB::table('unidades')
                     ->select(
                     	DB::raw('unidades.nombre as "nombre_unidad",
                     		unidades.id as "id_unidad",
                     		bloques.num_bloque,
                     		bloques.id as "id_bloque",
                     		parcelas.num_parcela,
                     		parcelas.id as "id_parcela",
                     		arboles.id as "id_arbol",
                     		arboles.dap as "dap",
                     		(select tnormal.hfuste from tnormal where tnormal.id_arbol = arboles.id) as "altura",
                     		(select nombre_vulgar 
							from especies where especies.id=arboles.id_especie) as "especie"')
                     	)
                     ->join('bloques','unidades.id','=','bloques.id_unidad')
                     ->join('parcelas','bloques.id','=','parcelas.id_bloque')
                     ->join('arboles','parcelas.id','=','arboles.id_parcela')
                     ->orderBy('unidades.nombre','asc')
                     ->get();
                     return View::make('resultado')->with('arboles',$arboles)->with('titulo',$titulo);*/
                     break;
                     case 4:
		        //
                     $titulo = '4.NÚMERO DE ÁRBOLES POR PARCELA Y BLOQUE SEGÚN ESPECIES.';
                     $arboles = DB::table('unidades')
                     ->select(
                     	DB::raw('unidades.nombre as "nombre_unidad",
                     		unidades.id as "id_unidad",
                     		bloques.num_bloque,
                     		bloques.id as "id_bloque",
                     		parcelas.num_parcela,
                     		parcelas.id as "id_parcela",
                     		arboles.id as "id_arbol",
                     		arboles.cap as "cap",
                     		arboles.dap as "dap",
                     		arboles.calidad_fuste as "calidad",
                     		arboles.vitalidad as "vitalidad",
                     		(select nombre_vulgar 
                          from especies where especies.id=arboles.id_especie) as "especie",
                      (select cod_especie 
                        from especies where especies.id=arboles.id_especie) as "cod_especie",
                      (select cod_numerico 
                        from especies where especies.id=arboles.id_especie) as "cod_numerico",
                      (select count(arboles.id) 
                        from parcelas,especies where arboles.id_especie=especies.id and arboles.id_parcela=parcelas.id
                        ) as "contador"
')
)
->join('bloques','unidades.id','=','bloques.id_unidad')
->join('parcelas','bloques.id','=','parcelas.id_bloque')
->join('arboles','parcelas.id','=','arboles.id_parcela')
->join('especies','arboles.id_especie','=','especies.id')
->groupBy('arboles.id_parcela')
->groupBy('arboles.id_especie')
->get();
return View::make('resultado')->with('arboles',$arboles)->with('titulo',$titulo);
break;
case 5:
		        //
$titulo = '5.VOLUMEN LA PARAGUA POR PARCELA Y BLOQUE SEGÚN ESPECIES.';
$arboles = DB::table('unidades')
->select(
  DB::raw('unidades.nombre as "nombre_unidad",
    unidades.id as "id_unidad",
    bloques.num_bloque,
    bloques.id as "id_bloque",
    parcelas.num_parcela,
    parcelas.id as "id_parcela",
    arboles.id as "id_arbol",
    arboles.cap as "cap",
    arboles.dap as "dap",
    arboles.calidad_fuste as "calidad",
    arboles.vitalidad as "vitalidad",
    (select tcandi.htotal from tcandi where tcandi.id_arbol = arboles.id) as "altura_tot",
    (select tnormal.hfuste from tnormal where tnormal.id_arbol = arboles.id) as "altura_fus",
    (select tcandi.num_arbol from tcandi where tcandi.id_arbol = arboles.id) as "num_arbol",
    (select nombre_vulgar 
      from especies where especies.id=arboles.id_especie) as "especie",
  (select cod_especie 
   from especies where especies.id=arboles.id_especie) as "cod_especie",
  (select cod_numerico 
   from especies where especies.id=arboles.id_especie) as "cod_numerico"
  ')
  )
->join('bloques','unidades.id','=','bloques.id_unidad')
->join('parcelas','bloques.id','=','parcelas.id_bloque')
->join('arboles','parcelas.id','=','arboles.id_parcela')
->join('especies','arboles.id_especie','=','especies.id')
->groupBy('arboles.id_parcela')
->groupBy('arboles.id_especie')
->get();
return View::make('resultado')->with('arboles',$arboles)->with('titulo',$titulo);
break;
case 6:
		        //
$titulo = '6.VOLUMEN MARN POR PARCELA Y BLOQUE SEGÚN ESPECIES.';
$arboles = DB::table('unidades')
->select(
  DB::raw('unidades.nombre as "nombre_unidad",
    unidades.id as "id_unidad",
    bloques.num_bloque,
    bloques.id as "id_bloque",
    parcelas.num_parcela,
    parcelas.id as "id_parcela",
    arboles.id as "id_arbol",
    arboles.cap as "cap",
    arboles.dap as "dap",
    arboles.calidad_fuste as "calidad",
    arboles.vitalidad as "vitalidad",
    (select tcandi.htotal from tcandi where tcandi.id_arbol = arboles.id) as "altura_tot",
    (select tnormal.hfuste from tnormal where tnormal.id_arbol = arboles.id) as "altura_fus",
    (select tcandi.num_arbol from tcandi where tcandi.id_arbol = arboles.id) as "num_arbol",
    (select nombre_vulgar 
      from especies where especies.id=arboles.id_especie) as "especie",
  (select cod_especie 
   from especies where especies.id=arboles.id_especie) as "cod_especie",
  (select cod_numerico 
   from especies where especies.id=arboles.id_especie) as "cod_numerico"
  ')
  )
->join('bloques','unidades.id','=','bloques.id_unidad')
->join('parcelas','bloques.id','=','parcelas.id_bloque')
->join('arboles','parcelas.id','=','arboles.id_parcela')
->join('especies','arboles.id_especie','=','especies.id')
->groupBy('arboles.id_parcela')
->groupBy('arboles.id_especie')
->get();
return View::make('resultado')->with('arboles',$arboles)->with('titulo',$titulo);
break;
case 7:
		        //
$titulo = '7.ÁREA BASAL POR BLOQUE SEGÚN ESPECIES.';
$arboles = DB::table('unidades')
->select(
  DB::raw('unidades.nombre as "nombre_unidad",
    unidades.id as "id_unidad",
    bloques.num_bloque,
    bloques.id as "id_bloque",
    parcelas.num_parcela,
    parcelas.id as "id_parcela",
    arboles.id as "id_arbol",
    arboles.cap as "cap",
    arboles.dap as "dap",
    arboles.calidad_fuste as "calidad",
    arboles.vitalidad as "vitalidad",
    (select tcandi.htotal from tcandi where tcandi.id_arbol = arboles.id) as "altura_tot",
    (select tnormal.hfuste from tnormal where tnormal.id_arbol = arboles.id) as "altura_fus",
    (select tcandi.num_arbol from tcandi where tcandi.id_arbol = arboles.id) as "num_arbol",
    (select nombre_vulgar 
      from especies where especies.id=arboles.id_especie) as "especie",
  (select cod_especie 
   from especies where especies.id=arboles.id_especie) as "cod_especie",
  (select cod_numerico 
   from especies where especies.id=arboles.id_especie) as "cod_numerico"
  ')
  )
->join('bloques','unidades.id','=','bloques.id_unidad')
->join('parcelas','bloques.id','=','parcelas.id_bloque')
->join('arboles','parcelas.id','=','arboles.id_parcela')
->join('especies','arboles.id_especie','=','especies.id')
->groupBy('arboles.id_parcela')
->groupBy('arboles.id_especie')
->get();
return View::make('resultado')->with('arboles',$arboles)->with('titulo',$titulo);
break;
case 8:
		        //
$titulo = '8.VOLUMEN LA PARAGUA POR BLOQUE SEGÚN ESPECIES.';
$arboles = DB::table('unidades')
->select(
  DB::raw('unidades.nombre as "nombre_unidad",
    unidades.id as "id_unidad",
    bloques.num_bloque,
    bloques.id as "id_bloque",
    parcelas.num_parcela,
    parcelas.id as "id_parcela",
    arboles.id as "id_arbol",
    arboles.cap as "cap",
    arboles.dap as "dap",
    arboles.calidad_fuste as "calidad",
    arboles.vitalidad as "vitalidad",
    (select tcandi.htotal from tcandi where tcandi.id_arbol = arboles.id) as "altura_tot",
    (select tnormal.hfuste from tnormal where tnormal.id_arbol = arboles.id) as "altura_fus",
    (select tcandi.num_arbol from tcandi where tcandi.id_arbol = arboles.id) as "num_arbol",
    (select nombre_vulgar 
      from especies where especies.id=arboles.id_especie) as "especie",
  (select cod_especie 
   from especies where especies.id=arboles.id_especie) as "cod_especie",
  (select cod_numerico 
   from especies where especies.id=arboles.id_especie) as "cod_numerico"
  ')
  )
->join('bloques','unidades.id','=','bloques.id_unidad')
->join('parcelas','bloques.id','=','parcelas.id_bloque')
->join('arboles','parcelas.id','=','arboles.id_parcela')
->join('especies','arboles.id_especie','=','especies.id')
->groupBy('arboles.id_parcela')
->groupBy('arboles.id_especie')
->get();
return View::make('resultado')->with('arboles',$arboles)->with('titulo',$titulo);
break;
case 9:
		        //
$titulo = '9.VOLUMEN MARN POR BLOQUE SEGÚN ESPECIES.';
$arboles = DB::table('unidades')
->select(
  DB::raw('unidades.nombre as "nombre_unidad",
    unidades.id as "id_unidad",
    bloques.num_bloque,
    bloques.id as "id_bloque",
    parcelas.num_parcela,
    parcelas.id as "id_parcela",
    arboles.id as "id_arbol",
    arboles.cap as "cap",
    arboles.dap as "dap",
    arboles.calidad_fuste as "calidad",
    arboles.vitalidad as "vitalidad",
    (select tcandi.htotal from tcandi where tcandi.id_arbol = arboles.id) as "altura_tot",
    (select tnormal.hfuste from tnormal where tnormal.id_arbol = arboles.id) as "altura_fus",
    (select tcandi.num_arbol from tcandi where tcandi.id_arbol = arboles.id) as "num_arbol",
    (select nombre_vulgar 
      from especies where especies.id=arboles.id_especie) as "especie",
  (select cod_especie 
   from especies where especies.id=arboles.id_especie) as "cod_especie",
  (select cod_numerico 
   from especies where especies.id=arboles.id_especie) as "cod_numerico"
  ')
  )
->join('bloques','unidades.id','=','bloques.id_unidad')
->join('parcelas','bloques.id','=','parcelas.id_bloque')
->join('arboles','parcelas.id','=','arboles.id_parcela')
->join('especies','arboles.id_especie','=','especies.id')
->groupBy('arboles.id_parcela')
->groupBy('arboles.id_especie')
->get();
return View::make('resultado')->with('arboles',$arboles)->with('titulo',$titulo);
break;
case 10:
		        //
break;
case 11:
		        //
$titulo = '11.EQUIPO DE TRABAJO POR PARCELA Y BLOQUE.';
$arboles = DB::table('unidades')
->select(
  DB::raw('unidades.nombre as "nombre_unidad",
    unidades.id as "id_unidad",
    bloques.num_bloque,
    bloques.id as "id_bloque",
    parcelas.num_parcela,
    parcelas.id as "id_parcela",
    parcelas.responsable as "responsable",
    parcelas.ayudante as "ayudante",
    parcelas.baqueano as "baqueano"
    ')
  )
->join('bloques','unidades.id','=','bloques.id_unidad')
->join('parcelas','bloques.id','=','parcelas.id_bloque')
->groupBy('parcelas.id')
->groupBy('parcelas.id_bloque')
->get();
return View::make('resultado')->with('arboles',$arboles)->with('titulo',$titulo);
break;
}
}


}
