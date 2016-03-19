<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('username',100)->unique();
			$table->string('password',100);
			$table->string('remember_token',100)->nullable();
			$table->timestamps();
		});

		//creates the admin user
		DB::table('users')->insert(
			array(
				'username'=>'enafor',
				'password'=>Hash::make('inventarioenafor'),
			)
		);	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
