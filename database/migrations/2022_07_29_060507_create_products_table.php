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
            $table->bigIncrements('id');
            $table->foreignId('store_id')->references('id')->on('stores')->onDelete('cascade');
            $table->foreignId('categury_id')->references('id')->on('productcateguries')->onDelete('cascade');
            $table->string('name')->unique();
            $table->string('slug')->nullable();
            $table->string('price');
            $table->string('user_price')->nullable();
            $table->text('disc')->nullable();//discription
            $table->text('short_disc')->nullable();//short discription
            $table->text('cover_img')->nullable();//cover img url
            $table->text('Key_features')->nullable();
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
