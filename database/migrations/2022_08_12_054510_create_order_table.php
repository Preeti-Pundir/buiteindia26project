<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_number');
            $table->string('placed_by');
            $table->integer('total_amout');
            $table->integer('items_qty');
            $table->enum('Payment_status', ['processing', 'incomplete', 'completed'])->default('processing');
            $table->enum('status', ['processing', 'incomplete', 'completed'])->default('processing');
            
            
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
        Schema::dropIfExists('order');
    }
}
