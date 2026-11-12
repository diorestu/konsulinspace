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
        VirtualOfficePackage::where('slug', 'virtual-office')->update(['is_popular' => false]);

        // 1. Paket Penerbitan CV + VO
        VirtualOfficePackage::updateOrCreate(
            ['slug' => 'penerbitan-cv-vo'],
            [
                'name' => 'Penerbitan CV + VO',
                'tagline' => 'Paket pendirian legalitas CV resmi Kemenkumham & alamat domisili Virtual Office 1 tahun di BSD.',
                'price_monthly' => 4900000,
                'price_yearly' => 4900000,
                'price_note' => 'exclude PPn',
                'billing_period' => 'tahun',
                'features' => [
                    'Akta Notaris & SK Kemenkumham Pendirian CV',
                    'NIB (Nomor Induk Berusaha) & OSS RBA',
                    'NPWP Badan Usaha & SKT Pajak',
                    'Virtual Office 1 Tahun di BSD City',
                    'Meeting Room Facility 4 hours/month',
                    'PT. Address & Mail',
                    'Layanan Resepsionis & Tamu Profesional',
                    'Zonasi Perkantoran Komersial untuk Pengurusan PKP',
                ],
                'is_popular' => false,
                'status' => 'active',
                'order_position' => 2,
                'cta_text' => 'Pilih Paket CV + VO',
            ]
        );

        // 2. Paket Penerbitan PT + VO
        VirtualOfficePackage::updateOrCreate(
            ['slug' => 'penerbitan-pt-vo'],
            [
                'name' => 'Penerbitan PT + VO',
                'tagline' => 'Solusi terlengkap pendirian PT resmi Kemenkumham & alamat domisili Virtual Office 1 tahun di BSD.',
                'price_monthly' => 6900000,
                'price_yearly' => 6900000,
                'price_note' => 'exclude PPn',
                'billing_period' => 'tahun',
                'features' => [
                    'Akta Notaris & SK Kemenkumham Pendirian PT',
                    'NIB (Nomor Induk Berusaha) & OSS RBA',
                    'NPWP Badan Usaha & SKT Pajak',
                    'Virtual Office 1 Tahun di BSD City',
                    'Meeting Room Facility 4 hours/month',
                    'PT. Address & Mail',
                    'Layanan Resepsionis & Tamu Profesional',
                    'Zonasi Perkantoran Komersial untuk Pengurusan PKP',
                ],
                'is_popular' => true,
                'status' => 'active',
                'order_position' => 3,
                'cta_text' => 'Pilih Paket PT + VO',
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        VirtualOfficePackage::whereIn('slug', ['penerbitan-cv-vo', 'penerbitan-pt-vo'])->delete();
    }
};
