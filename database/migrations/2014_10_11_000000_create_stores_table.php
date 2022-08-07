<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('store_code')->nullable();
            $table->string('email');
            $table->string('contact_no');
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state');
            $table->string('pincode');
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
        Schema::dropIfExists('stores');
    }
}
