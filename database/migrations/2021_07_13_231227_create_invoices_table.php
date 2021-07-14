<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('entered_by_id')->index()->unsigned()->nullable();
            $table->integer('supplier_id')->index()->unsigned()->nullable(); // Service Provided by
            // $table->integer('payment_method_id')->index()->unsigned()->nullable();
            $table->integer('invoice_number')->unsigned();
            $table->integer('payer_id')->index()->unsigned()->nullable(); //
            $table->string('title')->nullable(); // Invoice title
            $table->string('status')->nullable(); // Paid, Unpaid, Partial-Paid, Pending, Cancelled, Absolved
            $table->string('view_status')->nullable(); // Draft, Pending, Published
            $table->integer('product_id')->index()->unsigned()->nullable(); // Morph
            $table->decimal('amount',12,2)->nullable();
            $table->enum('currency',['TZS','USD'])->default('TZS')->nullable(); // currency
            $table->decimal('tax',12,2)->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('entered_by_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('restrict');
            $table->foreign('payer_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('invoices');
    }
}
