<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManufacturingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { //  manufact_product_type, manufact_model, manufact_brand, manufact_color, manufact_weight, manufact_size, manufact_capacity, manufact_origin, manufact_material, manufact_composition, manufact_condition, manufact_expire_date, manufact_manufactured_date
        Schema::create('manufacturings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned()->nullable(); // product id
            $table->string('manufact_product_type')->nullable();
            $table->string('manufact_model')->nullable();
            $table->string('manufact_brand')->nullable();
            $table->string('manufact_color')->nullable();
            $table->string('manufact_weight')->nullable();
            $table->string('manufact_size')->nullable();
            $table->string('manufact_capacity')->nullable();
            $table->string('manufact_origin')->nullable();
            $table->string('manufact_material')->nullable();
            $table->string('manufact_composition')->nullable();
            $table->string('manufact_condition')->nullable();
            $table->timestamp('manufact_expire_date')->nullable();
            $table->timestamp('manufact_manufactured_date')->nullable();
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
        Schema::drop('manufacturings');
    }
}
