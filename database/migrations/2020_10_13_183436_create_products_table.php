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
            $table->increments('id');
            $table->string('code')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->string('short_description');
            $table->string('colors')->nullable();
            $table->string('family')->nullable();
            $table->string('type_sale')->nullable();
            $table->float('price');
            $table->float('promotional_price')->nullable();
            $table->float('freeshipping')->nullable();
            $table->string('brand')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('diameter')->nullable();
            $table->string('weight')->nullable();
            $table->text('description')->nullable();
            $table->string('status')->default(0);
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
        Schema::dropIfExists('products');
    }
}
