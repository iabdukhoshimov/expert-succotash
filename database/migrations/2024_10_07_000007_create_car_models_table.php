<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('car_models', function (Blueprint $table) {
            $table->id(); 
            $table->string('name');
            $table->unsignedBigInteger('car_brand_id'); 
            // $table->unsignedBigInteger('tariff_slug'); 
            // $table->unsignedBigInteger('car_category_id'); 
            $table->timestamps();
        
            // Foreign key constraints
            $table->foreign('car_brand_id')->references('id')->on('car_brands')->onDelete('cascade');
            // $table->foreign('tariff_slug')->references('id')->on('tariff_slugs')->onDelete('cascade');
            // $table->foreign('car_category_id')->references('id')->on('car_categories')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('car_models');
    }
};
