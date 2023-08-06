<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('id_category');
            $table->unsignedBigInteger('id_sale');

            $table->integer('price');
            $table->string('image');
            $table->string('description');
            $table->timestamps();
            
            $table->foreign('id_category')->references('id')->on('category');
            $table->foreign('id_sale')->references('id')->on('sale');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
