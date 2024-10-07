<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id(); // Primary key (bigint)
            $table->unsignedBigInteger('customer_id')->nullable(); 
            $table->unsignedBigInteger('car_model_id')->nullable(); 
            $table->unsignedBigInteger('fuel_id')->nullable(); 
            $table->unsignedBigInteger('car_colour_id')->nullable(); // Foreign key to car_colours (bigint)
            $table->string('car_number')->nullable();
            $table->integer('manufacture_year')->nullable();
            $table->boolean('main_car')->default(false);
            $table->boolean('can_deliver')->default(false);
            $table->string('status')->nullable();
            $table->string('technical_passport_front')->nullable();
            $table->string('technical_passport_back')->nullable();
            $table->string('car_photo_left')->nullable();
            $table->string('car_photo_right')->nullable();
            $table->string('car_photo_front')->nullable();
            $table->string('car_photo_back')->nullable();
            $table->string('car_photo_trunk')->nullable();
            $table->string('car_photo_seats_back')->nullable();
            $table->string('car_photo_seats_front')->nullable();
            $table->timestamps();
        
            // Foreign key constraints
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('car_model_id')->references('id')->on('car_models')->onDelete('cascade');
            $table->foreign('fuel_id')->references('id')->on('fuels')->onDelete('cascade');
            $table->foreign('car_colour_id')->references('id')->on('car_colours')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
