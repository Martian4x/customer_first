<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('maincategory_id')->unsigned()->nullable();
            $table->string('name')->index();
            $table->string('product_code')->index();
            $table->string('slug')->unique()->index();
            $table->text('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
            
            $table->foreign('maincategory_id')->references('id')->on('maincategories')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('subcategories');
    }
}
