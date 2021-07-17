<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRewardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rewards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supplier_id')->index()->unsigned()->nullable(); // Service Provided by
            $table->integer('customer_id')->index()->unsigned()->nullable(); // Service Provided by
            $table->enum('type',['Money','AirTime   '])->default('AirTime'); // Invoice title
            $table->string('name')->nullable(); // Invoice title
            $table->string('reference_id')->nullable(); // Invoice title
            $table->decimal('amount',12,2)->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('restrict');
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rewards');
    }
}
