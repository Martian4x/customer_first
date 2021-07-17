<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('staff_id')->unsigned()->nullable();
            $table->integer('supplier_id')->unsigned()->nullable();
            $table->integer('product_id')->unsigned()->nullable();
            $table->integer('courier_id')->unsigned()->nullable();
            $table->decimal('quantity')->nullable();
            $table->string('order_no')->nullable(); 
            $table->enum('ship_to_billing_address', ['Yes','No']);
            $table->string('ship_fname')->nullable();
            $table->string('ship_lname')->nullable();
            $table->string('ship_phone')->nullable();
            $table->string('ship_email')->nullable();
            $table->string('ship_address1')->nullable();
            $table->string('ship_address2')->nullable();
            $table->string('ship_city')->nullable();
            $table->string('ship_zip_code')->nullable();
            $table->string('ship_country')->nullable();
            $table->string('billing_fname')->nullable();
            $table->string('billing_lname')->nullable();
            $table->string('billing_phone')->nullable();
            $table->string('billing_email')->nullable();
            $table->string('billing_address1')->nullable();
            $table->string('billing_address2')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_zip_code')->nullable();
            $table->string('billing_country')->nullable();
            $table->decimal('shipping_price',12,2)->nullable()->unsigned(); 
            $table->decimal('sub_total_price',12,2)->nullable()->unsigned(); 
            $table->text('order_description')->nullable();
            $table->enum('payment_method', ['BPay','Paypay','Bank Transfer','Cheque','Other'])->default('BPay');
            $table->enum('order_status', ['Rejected','In-Process','Delivered','Shipping','Returned','Pending'])->default('In-Process');
            $table->string('order_status_info')->nullable();
            $table->datetime('order_status_date')->nullable();
            $table->datetime('delivered_date')->nullable();
            $table->softDeletes();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('staff_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('restrict');
            $table->foreign('product_id')->references('id')->on('suppliers')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
