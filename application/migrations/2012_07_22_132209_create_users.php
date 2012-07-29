<?php

class Create_Users {

	/**
	 * Create the users table.
	 *
	 * @return void
	 */
	public function up()
	{
        // Create the users table
        Schema::create('users', function($table) {
            $table->engine = 'InnoDB';
            // auto incremental id (PK)
            $table->increments('id');
            $table->string('mxitid', 30);
            $table->string('uid', 40);
            $table->string('login', 255);
            $table->string('nickname', 255);
            $table->string('gender', 6);
            $table->date('birthday');
            $table->string('country', 3);
            $table->string('province', 20);
            $table->string('city', 200);
            $table->string('language', 3);
            $table->string('ua', 200);
            $table->integer('width');
            $table->timestamps();
            $table->unique('mxitid');
            $table->unique('uid');
            $table->unique('login');
            $table->index('gender');
            $table->index('birthday');
            $table->index('country');
            $table->index('province');
            $table->index('city');
            $table->index('language');
            $table->index('ua');
            $table->index('width');
        });
	}

	/**
	 * Drop the users table.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('users');
	}

}
