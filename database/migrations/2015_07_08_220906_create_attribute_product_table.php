<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributeProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_product', function(Blueprint $table)
        {
            $table->integer('attribute_id')->unsigned()->nullable();
            $table->foreign('attribute_id')
                  ->references('id')->on('attributes')
                  ->onDelete('cascade');

            $table->integer('product_id')->unsigned()->nullable();
            $table->foreign('product_id')
                  ->references('id')->on('products')
                  ->onDelete('cascade');

            $table->text('value');

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
        Schema::drop('attribute_product');
    }
}
