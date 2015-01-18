<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResidentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('residents', function(Blueprint $table)
		{
            $table->increments('id')->unsigned();

            $table->string('name', 255);
            $table->string('email', 255);
            $table->string('cpf', 14);
            $table->string('rg', 11);
            $table->string('contact_phone', 20);
            $table->date('birthdate');
            $table->enum('gender', array('M', 'F'));
            $table->string('img_path', 255);

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
        Schema::drop('residents');
	}
}