<?php

class Tsemillero extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tcandi';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = array('password', 'remember_token');

	//protected $guarded = array('id','password');

	public $timestamps = false;

	public function arboles(){
		return $this->belongsTo('Arbol','id_arbol','id');
	}


}