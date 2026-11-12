<?php

use App\Models\Room;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Room::where('location_floor', 'like', '%Lantai 4%')->each(function ($room) {
            $room->update([
                'location_floor' => str_replace('Lantai 4', 'Lantai 3', $room->location_floor),
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No reversal needed
    }
};
