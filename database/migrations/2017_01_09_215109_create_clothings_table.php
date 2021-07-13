<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClothingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() // Clothing products details
    { 
        Schema::create('clothings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned()->nullable(); // product id
            $table->string('cloth_brand')->nullable()->index();
            $table->decimal('cloth_price',12,2)->nullable()->unsigned(); //
            $table->decimal('cloth_price_discount',12,2)->nullable()->unsigned(); //
            $table->string('cloth_color')->nullable();
            $table->string('cloth_technics')->nullable();
            $table->string('cloth_sleeve_length')->nullable();
            $table->string('cloth_sleeve_style')->nullable();
            $table->string('cloth_style')->nullable();
            $table->string('cloth_material')->nullable();
            $table->string('cloth_item_type')->nullable();
            $table->string('cloth_thickness')->nullable();
            $table->string('cloth_model_number')->nullable();
            $table->string('cloth_age_range')->nullable();
            $table->enum('cloth_gender',['Men','Women','Multi-gender'])->nullable();
            $table->enum('cloth_size',['S','M','L','XL'])->nullable();
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
        Schema::drop('clothings');
    }
}
