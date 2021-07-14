<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    { 
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('entered_by_id')->unsigned()->nullable(); // User staff id
            $table->integer('supplier_id')->unsigned()->nullable();
            $table->integer('maincategory_id')->unsigned()->nullable();
            $table->integer('subcategory_id')->unsigned()->nullable();
            $table->string('name')->index();
            $table->string('slug')->unique()->index();
            $table->string('product_img')->default('generic_product.png')->nullable(); 
            $table->string('product_img_url')->nullable();
            $table->string('product_address', 45)->nullable();
            $table->decimal('min_quantity')->nullable(); 
            $table->decimal('price',12,2)->nullable()->unsigned(); 
            $table->decimal('price_discount',12,2)->nullable()->unsigned(); 
            $table->string('product_country');
            $table->enum('type', ['Agriculture','Clothing','Textile','Craft','Food','Manufacturing','Electronic']);
            $table->enum('status', ['Rejected','Accepted','Review','Pending','Out-Of-Stock'])->default('Review');
            $table->enum('badge', ['High-rated','Recommended','Sponsored','Normal'])->default('Normal');
            $table->string('status_info')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('views')->default(0); //TODO: Create a popular modules
            $table->softDeletes();
            $table->timestamps();
            
            $table->foreign('entered_by_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->foreign('maincategory_id')->references('id')->on('maincategories')->onDelete('restrict');
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
