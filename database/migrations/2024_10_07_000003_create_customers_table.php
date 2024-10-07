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
        Schema::create('customers', function (Blueprint $table) {
            $table->id(); // Primary key as bigint (auto-incrementing)
            $table->string('first_name');
            $table->string('last_name');
            $table->float('balance')->default(0);
            $table->string('gender');
            $table->string('pinfl');
            $table->date('birth_date');
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->string('customer_type'); // e.g., 'customer', 'driver', 'guest'
            $table->integer('device_count')->default(0);
            $table->string('avatar_url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
