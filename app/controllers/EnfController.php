<?php

class EnfController extends BaseController {

	public function showLogin()
	{
		return View::make('home');
	}

	public function doLogin()
	{
		$userdata = array(
			'username' => Input::get('username'),
			'password' => Input::get('password')
			);
		if(Auth::attempt($userdata)) {
			Session::flash('message','Session iniciada');
			return Redirect::to('/');
		} else {
			Session::flash('message','Usuario y/o Contraseña incorrecto');
			return Redirect::to('/');
		}
	}

	public function doLogout()
	{
		Auth::logout();
		Session::flash('message','Sesión finalizada');
				return Redirect::to('/');
	}

	public function populateBloques($id){
		if (Request::ajax()){
			$bloque=Unidad::find($id)->bloques()->get();
			return Response::json($bloque);
		}
	}

	public function populateParcelas($id){
		if (Request::ajax()){
			$parcela=Bloque::find($id)->parcelas()->get();
			return Response::json($parcela);
		}
	}

	public function manual(){
		//
		return Response::download('manual/manual.pdf');
	}

}
