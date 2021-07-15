<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmsSendRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_send_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index()->unsigned(); // Service Provided by
            $table->text('recepients')->nullable();
            $table->text('message')->nullable();
            $table->text('json_feedback')->nullable();
            $table->datetime('send_time')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sms_send_requests');
    }
}
