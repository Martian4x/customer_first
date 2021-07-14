<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() // Site Configuration
    {
        Schema::create('configurations', function (Blueprint $table) {
            $table->increments('id');
            // General Config
            $table->string('system_name')->default("CustomerFirst"); // 
            $table->string('system_title')->default("CustomerFirst"); // 
            $table->string('system_description')->default("CustomerFirst is a simple platform for small business owners to track, sell and engage with their customers."); // 
            $table->string('user_default_pass')->default("456123"); // 

            // SMS
            $table->string('sms_api_key')->nullable; // 
            $table->string('sms_secret_key')->nullable; // 
            $table->string('sms_url')->nullable; // 
            
            // Two-Way SMS
            $table->string('2sms_shortcode')->nullable; // 
            $table->string('2sms_longcode')->nullable; // 
            $table->string('2sms_number')->nullable; // 
            $table->string('2sms_api_key')->nullable; // 
            $table->string('2sms_secret_key')->nullable; // 
            
            // OTP
            $table->string('otp_url')->nullable; // 
            $table->string('otp_app_id')->nullable; // 
            $table->string('otp_channel')->nullable; // 
            
            
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
        Schema::drop('configurations');
    }
}
