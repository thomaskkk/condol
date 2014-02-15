<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoradoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('moradores', function(Blueprint $table)
		{
            $table->increments('id');

            $table->string('nome', 255);
            $table->string('email', 255);
            $table->string('cpf', 14);
            $table->string('rg', 11);
            $table->string('tel_contato', 20);
            $table->date('aniversario');
            $table->enum('sexo', array('M', 'F'));
            $table->string('dir_foto', 255);

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
        Schema::drop('moradores');
	}
}