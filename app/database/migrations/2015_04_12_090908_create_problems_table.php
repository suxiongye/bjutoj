<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('problems', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('title');
            $table->text('content');
            $table->float('radio');
            $table->integer('accepted');
            $table->integer('submit');
            $table->text('inputcase')->nullable();
            $table->text('outputcase');
            $table->float('timelimit');
            $table->integer('memorylimit');
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
		Schema::drop('problems');
	}

}
