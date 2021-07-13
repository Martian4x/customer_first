<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCraftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()// Craft products details
    {
        Schema::create('crafts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned()->nullable(); // product id
            $table->string('craft_brand')->nullable()->index();
            $table->decimal('craft_price',12,2)->nullable()->unsigned(); //
            $table->decimal('craft_price_discount',12,2)->nullable()->unsigned(); //
            $table->string('craft_color')->nullable();
            $table->string('craft_technics')->nullable();
            $table->string('craft_sleeve_length')->nullable();
            $table->string('craft_style')->nullable();
            $table->string('craft_material')->nullable();
            $table->string('craft_item_type')->nullable();
            $table->string('craft_thickness')->nullable();
            $table->string('craft_model_number')->nullable();
            $table->string('craft_age_range')->nullable();
            $table->enum('craft_gender',['Men','Women','Multi-gender'])->nullable();
            $table->enum('craft_size',['S','M','L','XL'])->nullable();
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
        Schema::drop('crafts');
    }
}
