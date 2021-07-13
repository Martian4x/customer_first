<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgriculturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() // Agriculture products details
    {// id, product_id, crop_type, quality, size, weight, packaging, origin, color 
        Schema::create('agricultures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned()->nullable(); // product id
            $table->string('agri_brand')->nullable();
            $table->string('agri_crop_type')->nullable();
            $table->string('agri_quality')->nullable();
            $table->string('agri_size')->nullable();
            $table->string('agri_weight')->nullable();
            $table->string('agri_packaging')->nullable();
            $table->string('agri_origin')->nullable();
            $table->string('agri_color')->nullable();
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
        Schema::drop('agricultures');
    }
}
