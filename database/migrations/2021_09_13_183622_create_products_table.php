<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{

    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('store_id');
            $table->string('name');
            $table->string('description');
            $table->text('body');
            $table->string('slug');
            $table->decimal('price' , 10, 2);
            $table->timestamps();
            $table->foreign('store_id')->references('id')->on('stores');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
