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
        Schema::create('customer_sessions', function (Blueprint $table) {
            $table->id(); // Primary key as bigint (auto-incrementing)
            $table->foreignId('customer_id') // Foreign key relationship with customers table
                  ->constrained('customers')
                  ->onDelete('cascade');
            $table->string('session_token')->unique(); // Token to identify session
            $table->string('device_info')->nullable(); // Device information (e.g., browser, device type)
            $table->ipAddress('ip_address')->nullable(); // IP address of the customer during session
            $table->timestamp('last_activity')->useCurrent(); // Last activity timestamp
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_sessions');
    }
};
