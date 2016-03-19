<?php

class Unidad extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'unidades';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	
	//protected $hidden = array('password', 'remember_token');

	//protected $guarded = array('id','password');

	public $timestamps = false;


	public function bloques(){
		return $this->hasmany('Bloque','id_unidad');
	}

}