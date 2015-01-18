<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('units', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();

            $table->string('name', 255);
            $table->enum('block', array('A', 'B', 'C', 'D'));

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
        Schema::drop('units');
	}

}
