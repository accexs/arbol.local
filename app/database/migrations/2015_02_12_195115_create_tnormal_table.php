<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTnormalTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('tnormal',function($table)
			{
				$table->increments('id');
				$table->integer('id_arbol')->unsigned()->nullable();
				$table->string('tipo',10)->default('normal');
				$table->integer('num_arbol')->unsigned();
				$table->decimal('hfuste',5,2)->nullable();
				$table->foreign('id_arbol')->references('id')->on('arboles')->onDelete('cascade')->onUpdate('cascade');

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
		Schema::drop('tnormal');
	}

}
