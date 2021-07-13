<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElectronicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { // electronic_type, electronic_specs,  electronic_other_specs, electronic_os, electronic_brand, electronic_model, electronic_color, electronic_weight, electronic_size, electronic_height, electronic_condition, electronic_release_date
        Schema::create('electronics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('electronic_type')->nullable();
            $table->string('electronic_specs')->nullable();
            $table->string('electronic_other_specs')->nullable();
            $table->string('electronic_os')->nullable();            
            $table->string('electronic_brand')->nullable();
            $table->string('electronic_model')->nullable();
            $table->string('electronic_color')->nullable();
            $table->string('electronic_weight')->nullable();
            $table->string('electronic_size')->nullable();
            $table->string('electronic_height')->nullable();
            $table->string('electronic_condition')->nullable();
            $table->timestamp('electronic_release_date')->nullable();
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
        Schema::drop('electronics');
    }
}
