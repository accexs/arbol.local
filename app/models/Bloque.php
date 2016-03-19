<?php

class Bloque extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'bloques';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = array('password', 'remember_token');

	//protected $guarded = array('id','password');

	public $timestamps = false;

	public function unidades(){
		return $this->belongsTo('Unidad','id_unidad');
	}

	public function parcelas(){
		return $this->hasmany('Parcela','id_bloque');
	}

}