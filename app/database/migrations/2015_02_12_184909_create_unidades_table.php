<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('unidades', function($table)
			{
				$table->increments('id');
				$table->string('nombre',100)->unique();
				$table->string('estado',100);
				$table->string('municipio',100);
				$table->string('reserva',100);
				$table->string('bloques',100);
				//$table->integer('user_id')->unsigned();
				//$table->foreign('user_id')->references('id')->on('users');
				$table->timestamps();
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
		Schema::drop('unidades');
	}

}
