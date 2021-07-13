<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMineralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() // Minerals products details
    { // mineral_product_type, mineral_brand, mineral_size, mineral_color, mineral_origin
        Schema::create('minerals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned()->nullable(); // product id
            $table->string('mineral_product_type')->nullable();
            $table->string('mineral_brand')->nullable();
            $table->string('mineral_size')->nullable();
            $table->string('mineral_weight')->nullable();
            $table->string('mineral_quality')->nullable();
            $table->string('mineral_color')->nullable();
            $table->string('mineral_origin')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('minerals');
    }
}
