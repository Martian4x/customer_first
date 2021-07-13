<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTextilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() // Textiles products details
    {
        Schema::create('textiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned()->nullable(); // product id
            $table->string('textile_brand')->nullable()->index();
            $table->decimal('textile_price',12,2)->nullable()->unsigned(); //
            $table->decimal('textile_price_discount',12,2)->nullable()->unsigned(); //
            $table->string('textile_color')->nullable();
            $table->string('textile_technics')->nullable();
            $table->string('textile_sleeve_length')->nullable();
            $table->string('textile_style')->nullable();
            $table->string('textile_material')->nullable();
            $table->string('textile_item_type')->nullable();
            $table->string('textile_thickness')->nullable();
            $table->string('textile_model_number')->nullable();
            $table->string('textile_age_range')->nullable();
            $table->enum('textile_gender',['Men','Women','Multi-gender'])->nullable();
            $table->enum('textile_size',['S','M','L','XL'])->nullable();
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
        Schema::drop('textiles');
    }
}
