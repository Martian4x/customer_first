<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('entered_by_id')->index()->unsigned()->nullable();
            $table->integer('payer_id')->index()->unsigned()->nullable(); //
            $table->integer('invoice_id')->index()->unsigned()->nullable(); //
            $table->string('title')->nullable(); // Payment Title
            $table->decimal('amount',14,2)->unsigned(); // Amount paid
            $table->date('payment_date')->nullable(); 
            $table->string('payer_name')->nullable();
            $table->string('payer_mobile')->nullable();
            $table->string('payment_method_number')->nullable(); // cheque id, insurance id no 
            $table->string('receipt_no')->nullable(); // Payment Receipt
            $table->enum('pay_status', ['Paid','Pending','Cancelled'])->default('Paid'); // Paid, Pending
            $table->enum('pay_type', ['Full','Partial']); //
            $table->text('description')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('entered_by_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('payer_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('payments');
    }
}
