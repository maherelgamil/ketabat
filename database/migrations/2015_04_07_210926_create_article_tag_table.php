<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTagTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('article_tag', function(Blueprint $table)
		{
		    $table->integer('article_id')->unsigned()->nullable();
			$table->foreign('article_id')
			      ->references('id')->on('articles')
			      ->onDelete('cascade');

		    $table->integer('tag_id')->unsigned()->nullable();
			$table->foreign('tag_id')
				  ->references('id')->on('tags')
				  ->onDelete('cascade');

            $table->unique(['article_id', 'tag_id']);

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
		Schema::drop('article_tag');
	}

}
