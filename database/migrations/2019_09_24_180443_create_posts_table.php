<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title', 255);
			$table->text('body');
			$table->integer('user_id');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('posts');
	}
}