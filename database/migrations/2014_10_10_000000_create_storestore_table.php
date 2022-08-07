<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStorestoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storestore', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->string('name')->nullable();
            //$table->string('name')->default('');
            $table->string('store_code')->nullable();
            $table->string('email')->default('');
            $table->string('contact_no')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('pincode')->nullable();
            $table->enum('status', ['processing', 'incomplete', 'completed'])->default('processing');
            $table->boolean('status1')->default(0);
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
        Schema::dropIfExists('storestore');
    }
}
