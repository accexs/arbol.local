<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParcelasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('parcelas', function($table)
			{
				$table->increments('id');
				$table->integer('num_parcela');
				$table->string('ayudante',100)->nullable();
				$table->string('responsable',100)->nullable();
				$table->string('baqueano',100)->nullable();
				$table->integer('id_bloque')->unsigned();
				$table->foreign('id_bloque')->references('id')->on('bloques')->onDelete('cascade')->onUpdate('cascade');

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
		Schema::drop('parcelas');
	}

}
