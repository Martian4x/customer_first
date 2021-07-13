<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaincategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maincategories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->string('slug')->unique()->index();
            $table->enum('type', ['Agriculture','Clothing','Textile','Craft','Mineral','Manufacturing','Electronic']);
            $table->string('quantity_unit', 45)->nullable(); // Kg, Tons, Items, Pieces, Bundle
            $table->text('description')->nullable();
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
        Schema::drop('maincategories');
    }
}
