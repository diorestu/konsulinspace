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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('category')->index(); // coworking, virtual_office, meeting_room, private_office, event_space
            $table->string('capacity')->nullable(); // e.g. "1-4 Pax"
            $table->string('area_sqm')->nullable(); // e.g. "35 m²"
            $table->decimal('price_hourly', 12, 2)->nullable();
            $table->decimal('price_daily', 12, 2)->nullable();
            $table->decimal('price_monthly', 12, 2)->nullable();
            $table->string('location_floor')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->json('amenities')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->string('status')->default('available'); // available, booked, maintenance
            $table->integer('order_position')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
