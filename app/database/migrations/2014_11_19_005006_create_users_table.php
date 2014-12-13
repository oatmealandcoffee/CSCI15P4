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

        $user = new User;
        $user->username = 'Alice';
        $user->email = 'alice@regan15.pw';
        $user->password = Hash::make('alice');
        $user->save();

        $user = new User;
        $user->username = 'Bob';
        $user->email = 'bob@regan15.pw';
        $user->password = Hash::make('bob');
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
