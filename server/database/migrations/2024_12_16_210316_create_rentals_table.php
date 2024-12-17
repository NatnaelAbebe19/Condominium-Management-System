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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->integer('bedrooms');
            $table->integer('floor');
            $table->string('location');
            $table->decimal('price', 10, 2);
            $table->string('status')->default('available');
            $table->float('area')->after('location'); // Add area column
            $table->unsignedBigInteger('renter_id')->after('id'); // Add renter_id
            $table->unsignedBigInteger('customer_id')->nullable()->after('renter_id'); // Add customer_id, nullable
            $table->foreign('renter_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('set null');
            $table->json('images'); // Store image paths as JSON
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
