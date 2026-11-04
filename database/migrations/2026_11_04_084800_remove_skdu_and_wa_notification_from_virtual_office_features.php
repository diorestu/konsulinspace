<?php

use App\Models\VirtualOfficePackage;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $packages = VirtualOfficePackage::all();
        foreach ($packages as $pkg) {
            if (is_array($pkg->features)) {
                $filtered = array_values(array_filter($pkg->features, function ($feature) {
                    $f = strtolower((string) $feature);
                    if (str_contains($f, 'skdu') || str_contains($f, 'surat keterangan domisili gedung')) {
                        return false;
                    }
                    if (str_contains($f, 'notifikasi surat') || str_contains($f, 'whatsapp real-time')) {
                        return false;
                    }
                    return true;
                }));
                $pkg->update(['features' => $filtered]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No reversal needed
    }
};
