<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTwoWaySmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('two_way_sms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('from')->nullable(); 
            $table->string('to')->nullable(); 
            $table->string('channel')->nullable(); 
            $table->string('timeUTC')->nullable(); 
            $table->string('transaction_id')->nullable(); 
            $table->text('message')->nullable();
            $table->text('billing')->nullable();
            $table->enum('direction', ['Inbound','Outbound'])->nullable();
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
        Schema::drop('two_way_sms');
    }
}
