<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Arbol extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'arboles';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	protected $guarded = array('id');

	public $timestamps = false;

	public function parcelas(){
		return $this->belongsTo('Parcela','id_parcela');
	}

	public function especies(){
		return $this->belongsTo('Especie','id_especie');
	}

}
