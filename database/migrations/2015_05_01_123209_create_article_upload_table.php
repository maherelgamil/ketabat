<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleUploadTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('article_upload', function(Blueprint $table)
		{
		    $table->integer('article_id')->unsigned()->nullable();
			$table->foreign('article_id')
			      ->references('id')->on('articles')
			      ->onDelete('cascade');

		    $table->integer('upload_id')->unsigned()->nullable();
			$table->foreign('upload_id')
				  ->references('id')->on('uploads')
				  ->onDelete('cascade');

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
		Schema::drop('article_upload');
	}

}
