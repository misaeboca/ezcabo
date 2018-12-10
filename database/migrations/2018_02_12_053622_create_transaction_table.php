<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id')->length(11)->nullable();
            $table->integer('user_id')->length(11)->nullable();
            $table->string('email')->nullable();
            $table->string('gateway');
            $table->string('payment_amount');
            $table->string('payment_id');
            $table->integer('date')->length(11);  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction');
    }
}
