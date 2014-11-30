<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('members', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('unique_number')->unique();
			$table->string('ssnit_number')->unique();
			$table->string('lastname');
			$table->string('firstname');
			$table->string('othernames');
			$table->string('occupation');
			$table->string('company');
			$table->enum('marital_status', ['single', 'married', 'divorced', 'widowed']);
			$table->enum('gender', ['male', 'female']);
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
		Schema::drop('members');
	}

}
