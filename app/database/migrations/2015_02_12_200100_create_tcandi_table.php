<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTcandiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('tcandi',function($table)
			{
				$table->increments('id');
				$table->integer('id_arbol')->unsigned()->nullable();
				$table->string('tipo',10)->default('candi');
				$table->integer('num_arbol')->unsigned();
				$table->decimal('htotal',5,2)->nullable();
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
		Schema::drop('tcandi');
	}

}
