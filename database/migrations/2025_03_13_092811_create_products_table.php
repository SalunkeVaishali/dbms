<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('product_name');
            $table->text('product_description')->nullable();
            $table->decimal('product_price', 10, 2);
            $table->string('product_image')->nullable();
            //$table->unsignedBigInteger('category_id'); // Foreign key reference
            $table->softDeletes(); 
            $table->timestamps();

            // Foreign Key Constraint
           //$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
           $table->foreignId('category_id')->constrained('categories');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
