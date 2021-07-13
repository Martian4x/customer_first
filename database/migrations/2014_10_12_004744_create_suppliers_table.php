<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('entered_by_id')->unsigned()->nullable(); 
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('company_name', 45)->nullable();
            $table->string('supplier_id');
            $table->string('supplier_img')->default('generic_logo.png')->nullable(); 
            $table->string('supplier_img_url')->nullable();
            $table->string('supplier_address', 45)->nullable();
            $table->string('supplier_mob_no', 45)->nullable();
            $table->string('supplier_tel_no', 45)->nullable();
            $table->string('supplier_postal_code', 45)->nullable();
            $table->string('supplier_email', 45)->nullable();
            $table->string('supplier_country')->nullable();
            $table->enum('supplier_verified', ['Yes','No'])->default('No');
            $table->enum('supplier_status', ['Active','Banned','Pending','Inactive'])->default('Active');
            $table->text('supplier_description')->nullable();
            $table->softDeletes();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('suppliers');
    }
}
