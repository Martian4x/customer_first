<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('entered_by_id')->unsigned()->nullable();
            $table->integer('user_group_id')->unsigned()->nullable();
            $table->string('fname', 50);
            $table->string('lname', 50);
            $table->string('email', 50)->nullable();
            $table->string('password', 60);
            $table->string('img')->default('user.jpg')->nullable(); 
            $table->string('img_url')->nullable();
            $table->string('address')->nullable(); 
            $table->string('mob_no', 50)->nullable(); 
            $table->string('tel_no', 50)->nullable();
            $table->string('country')->nullable();
            $table->enum('mob_no_verified', ['Yes','No'])->default('No');
            $table->enum('status', ['Active','Banned','Pending','Inactive'])->default('Active');
            $table->enum('role', ['User','Staff','Supplier','Supplier_Staff','Admin'])->default('User');
            $table->text('description')->nullable();
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
