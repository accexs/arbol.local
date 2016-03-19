<?php

class Parcela extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'parcelas';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = array('password', 'remember_token');

	//protected $guarded = array('id','password');

	public $timestamps = false;

	public function bloques(){
		return $this->belongsTo('Bloque','id_bloque');
	}

	public function arboles(){
		return $this->hasmany('Arbol','id_parcela');
	}


}