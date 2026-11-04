<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class VirtualOfficePackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'tagline',
        'price_monthly',
        'price_yearly',
        'price_note',
        'billing_period',
        'features',
        'is_popular',
        'status',
        'order_position',
        'cta_text',
        'cta_link',
    ];

    protected function casts(): array
    {
        return [
            'features' => 'array',
            'is_popular' => 'boolean',
            'price_monthly' => 'decimal:2',
            'price_yearly' => 'decimal:2',
            'order_position' => 'integer',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function ($pkg) {
            if (empty($pkg->slug)) {
                $baseSlug = Str::slug($pkg->name);
                $slug = $baseSlug;
                $counter = 1;
                while (static::where('slug', $slug)->exists()) {
                    $slug = $baseSlug . '-' . $counter++;
                }
                $pkg->slug = $slug;
            }
        });
    }

    public function getFormattedPriceMonthlyAttribute(): string
    {
        return 'Rp ' . number_format((float) $this->price_monthly, 0, ',', '.');
    }

    public function getFormattedPriceYearlyAttribute(): ?string
    {
        if ($this->price_yearly === null) {
            return null;
        }

        return 'Rp ' . number_format((float) $this->price_yearly, 0, ',', '.');
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 'active')->orderBy('order_position', 'asc');
    }
}
