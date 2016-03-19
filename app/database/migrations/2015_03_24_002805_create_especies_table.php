<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEspeciesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('especies',function($table)
			{
				//
				$table->increments('id');
				$table->integer('cod_numerico')->unsigned();
				$table->string('nombre_vulgar');
				$table->string('nombre_cientifico',100)->nullable();
				$table->string('familia',100)->nullable();
				$table->string('cod_especie',4);
				$table->string('tipo_especie',15);
				
			});

		Schema::table('arboles',function($table)
			{
				//
				$table->foreign('id_especie')->references('id')->on('especies')->onDelete('cascade')->onUpdate('cascade');
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
		Schema::table('arboles',function($table)
			{
				//
				$table->dropForeign('arboles_id_especie_foreign');
			});

		Schema::drop('especies');
	}

}
