<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArbolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('arboles',function($table)
			{
				$table->increments('id');
				//$table->string('nombre_vulgar',100)->nullable();
				//$table->string('nombre_cientifico',100)->nullable();
				//$table->string('familia',100)->nullable();
				//$table->string('cod_especie',4);
				//$table->string('tipo_especie',15);
				$table->integer('num_arbol')->unsigned()->nullable();
				$table->string('calidad_fuste',1)->nullable();
				$table->string('vitalidad',1)->nullable();
				$table->decimal('cap',5,2)->nullable();
				$table->decimal('dap',5,2)->nullable();
				$table->string('coordenadas',30)->nullable();
				$table->integer('id_parcela')->unsigned()->nullable();
				$table->foreign('id_parcela')->references('id')->on('parcelas')->onDelete('cascade')->onUpdate('cascade');
				$table->integer('id_especie')->unsigned()->nullable();
				
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
		Schema::drop('arboles');
	}

}
