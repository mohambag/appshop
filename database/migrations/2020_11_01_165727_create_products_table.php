<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->integer('price');
            $table->string('discount');
            $table->string('img');
            $table->string('thumbnail');
            $table->text('abstract');
            $table->longText('description');
            $table->integer('user_id')->nullable();
            $table->integer('hit');
            $table->integer('tedad_mojod');
            $table->tinyInteger('status');
            $table->string('article_author');
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
        Schema::dropIfExists('products');
    }
}
