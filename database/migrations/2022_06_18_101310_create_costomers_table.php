<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costomers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('store_id')->references('id')->on('stores')->onDelete('cascade');
            $table->string('email')->unique();
            $table->string('phone_no')->unique();
            $table->boolean('isverified');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('costomers');
    }
}
