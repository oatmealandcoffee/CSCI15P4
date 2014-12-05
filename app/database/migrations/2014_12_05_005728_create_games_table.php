<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('games', function($table) {

            // create common columns
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            // create specific columns
            $table->string('fen');
            $table->integer('white_id');
            $table->integer('black_id');
            $table->integer('turn_id');
            $table->integer('result');

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('games');
	}

}
