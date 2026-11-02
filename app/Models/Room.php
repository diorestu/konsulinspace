<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category',
        'capacity',
        'area_sqm',
        'price_hourly',
        'price_daily',
        'price_monthly',
        'location_floor',
        'short_description',
        'description',
        'amenities',
        'is_featured',
        'status',
        'order_position',
    ];

    protected function casts(): array
    {
        return [
            'amenities' => 'array',
            'is_featured' => 'boolean',
            'price_hourly' => 'decimal:2',
            'price_daily' => 'decimal:2',
            'price_monthly' => 'decimal:2',
            'order_position' => 'integer',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function ($room) {
            if (empty($room->slug)) {
                $baseSlug = Str::slug($room->name);
                $slug = $baseSlug;
                $counter = 1;
                while (static::where('slug', $slug)->exists()) {
                    $slug = $baseSlug . '-' . $counter++;
                }
                $room->slug = $slug;
            }
        });
    }

    public function media(): HasMany
    {
        return $this->hasMany(RoomMedia::class)->orderBy('order_position', 'asc')->orderBy('id', 'asc');
    }

    public function images(): HasMany
    {
        return $this->hasMany(RoomMedia::class)
            ->where('file_type', 'image')
            ->orderBy('order_position', 'asc');
    }

    public function videos(): HasMany
    {
        return $this->hasMany(RoomMedia::class)
            ->where('file_type', 'video')
            ->orderBy('order_position', 'asc');
    }

    public function primaryMedia(): HasOne
    {
        return $this->hasOne(RoomMedia::class)->where('is_primary', true);
    }

    public function inquiries(): HasMany
    {
        return $this->hasMany(Inquiry::class);
    }

    public function getThumbnailUrlAttribute(): string
    {
        // Check primary media
        $primary = $this->media->firstWhere('is_primary', true);
        if ($primary && $primary->file_type === 'image') {
            return $primary->url;
        }

        // Or first image
        $firstImage = $this->media->firstWhere('file_type', 'image');
        if ($firstImage) {
            return $firstImage->url;
        }

        // Placeholder fallback image
        return 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1200&q=80';
    }

    public function getCategoryLabelAttribute(): string
    {
        return match ($this->category) {
            'coworking' => 'Co-Working Space',
            'virtual_office' => 'Virtual Office',
            'meeting_room' => 'Meeting Room',
            'private_office' => 'Private Office',
            'event_space' => 'Event & Training Space',
            default => ucfirst(str_replace('_', ' ', $this->category)),
        };
    }

    public function getFormattedPriceAttribute(): string
    {
        if ($this->price_hourly && $this->price_hourly > 0) {
            return 'Rp ' . number_format($this->price_hourly, 0, ',', '.') . ' / jam';
        }
        if ($this->price_daily && $this->price_daily > 0) {
            return 'Rp ' . number_format($this->price_daily, 0, ',', '.') . ' / hari';
        }
        if ($this->price_monthly && $this->price_monthly > 0) {
            return 'Rp ' . number_format($this->price_monthly, 0, ',', '.') . ' / bulan';
        }
        return 'Hubungi Kami';
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'available' => 'Tersedia',
            'booked' => 'Terisi / Booked',
            'maintenance' => 'Pemeliharaan',
            default => ucfirst($this->status),
        };
    }

    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'available' => 'emerald',
            'booked' => 'amber',
            'maintenance' => 'rose',
            default => 'slate',
        };
    }
}
