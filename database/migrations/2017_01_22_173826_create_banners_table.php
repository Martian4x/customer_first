<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('caption')->nullable();
            $table->string('img');
            $table->enum('status', ['Show','Hide','Scheduled']);
            $table->text('url')->nullable();
            $table->text('description')->nullable();
            $table->timestamp('start_day');
            $table->timestamp('end_day');
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
        Schema::drop('banners');
    }
}
