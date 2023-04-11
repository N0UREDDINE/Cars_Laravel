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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('model');
            $table->string('year');
            $table->string('color');
            $table->string('price');
            $table->unsignedBigInteger('id_type');
            $table->unsignedBigInteger('id_categorie');
            $table->unsignedBigInteger('id_supplier');
            $table->string('image');
            $table->timestamps();

            $table->foreign('id_type')->references('id')->on('types')->onDelete('cascade');
            $table->foreign('id_categorie')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('id_supplier')->references('id')->on('suppliers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
