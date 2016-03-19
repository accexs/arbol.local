<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBloquesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('bloques', function($table)
			{
				$table->increments('id');
				$table->integer('num_bloque');
				$table->integer('id_unidad')->unsigned();
				$table->foreign('id_unidad')->references('id')->on('unidades')->onDelete('cascade')->onUpdate('cascade');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('bloques');
	}

}
