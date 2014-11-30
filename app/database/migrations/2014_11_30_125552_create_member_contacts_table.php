<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemberContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member_contacts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('member_id')->unsigned();
			$table->string('name');
			$table->string('relationship');
			$table->string('contact_number');
			$table->timestamps();
			
			$table->foreign('member_id')
				->references('id')
				->on('members')
				->onDelete('restrict');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('member_contacts');
	}

}
