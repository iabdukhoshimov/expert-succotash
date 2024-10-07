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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('car_id')->nullable();
            $table->string('document_type');
            $table->string('front_side')->nullable();
            $table->string('reverse_side')->nullable();
            $table->string('full_photo')->nullable();
            $table->string('back_side')->nullable();
            $table->string('selfie_with_license')->nullable();
            $table->string('license')->nullable();
            $table->string('status')->default('pending'); 
            $table->string('rejection_reason')->nullable();
            $table->timestamp('approved_at')->nullable(); 
            $table->timestamp('rejected_at')->nullable(); 
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
