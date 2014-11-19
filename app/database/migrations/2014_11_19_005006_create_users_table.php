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
        Schema::create('users', function($table) {

            // create common columns (4 total)
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            // create specific columns
            $table->string('username');
            $table->string('password');
            $table->string('email');
            $table->rememberToken();

        });

        $user = new User;
        $user->username = 'admin';
        $user->email = 'admin@regan15.pw';
        $user->password = Hash::make('admin');
        $user->save();

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
