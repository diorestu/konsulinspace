<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'service_type',
        'name',
        'email',
        'phone',
        'company_name',
        'start_date',
        'duration',
        'notes',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
        ];
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function getServiceLabelAttribute(): string
    {
        if ($this->room) {
            return $this->room->name;
        }

        return match ($this->service_type) {
            'coworking' => 'Co-Working Space',
            'virtual_office' => 'Virtual Office',
            'meeting_room' => 'Meeting Room',
            'private_office' => 'Private Office',
            'event_space' => 'Event Space',
            'consultation' => 'Konsultasi Ruangan',
            default => ucfirst(str_replace('_', ' ', $this->service_type ?? 'Umum')),
        };
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'new' => 'Baru',
            'contacted' => 'Sudah Dihubungi',
            'dealing' => 'Proses Diskusi',
            'completed' => 'Deal / Selesai',
            'cancelled' => 'Batal',
            default => ucfirst($this->status),
        };
    }
}
