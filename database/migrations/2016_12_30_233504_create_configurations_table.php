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
            $table->string('2sms_callback')->nullable; // 
            
            // Airtime
            $table->string('airtime_api_key')->nullable; // 7fc0ccddff3747dc
            $table->string('airtime_secret_key')->nullable; // ZWQwOTI2YTFkNmU3OGEyOTNmZjUyYzhiOTY2YWQzM2FmODM4ZjQxZGZjZDRkM2FlZmIwMzYyNjFhZGMzNzEwYg==
            $table->string('airtime_url')->nullable; // 
            $table->string('airtime_callback')->nullable; // 
            
            // BPay
            $table->string('bpay_api_key')->nullable; // f60400386f92b128
            $table->string('bpay_secret_key')->nullable; // NjU3N2E3YzU1OTIzZmJmOWIxY2RhZTUxYWE5NTNjMGZlYjlhMTlkZDU1ODZkMzU4MmE5YTU1NjYwMmFlMjc4YQ==
            $table->string('bpay_checkout')->nullable; // 
            $table->string('bpay_callback')->nullable; // 
            $table->string('bpay_pattern_match')->nullable; // 
            $table->string('bpay_bill_number')->nullable; // 

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
