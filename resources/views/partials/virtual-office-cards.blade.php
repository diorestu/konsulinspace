<div class="{{ ($packages ?? collect())->count() === 1 ? 'max-w-xl mx-auto' : 'grid grid-cols-1 md:grid-cols-3 gap-6' }}">
    @forelse($packages ?? [] as $package)
    <div class="{{ $package->is_popular ? 'relative rounded-3xl p-8 border-2 border-[#0353a4] bg-gradient-to-b from-white to-[#edf4fc]/40 flex flex-col justify-between shadow-lg' : 'rounded-3xl p-8 border border-slate-200 bg-white flex flex-col justify-between hover:border-[#0353a4] transition shadow-xs' }}">
        @if($package->is_popular)
        <span class="absolute -top-3.5 right-8 bg-[#0353a4] text-white text-[11px] font-bold uppercase tracking-wider px-3.5 py-1 rounded-full shadow-sm">
            Paling Populer &amp; Hemat
        </span>
        @endif
        <div>
            <div class="flex items-start justify-between gap-4">
                <div>
                    <h3 class="text-xl sm:text-2xl font-extrabold text-slate-900">{{ $package->name }}</h3>
                    @if($package->tagline)
                    <p class="text-xs sm:text-sm text-slate-500 mt-1 leading-relaxed">{{ $package->tagline }}</p>
                    @endif
                </div>
            </div>

            <div class="mt-6 mb-6 p-4 rounded-2xl bg-slate-50 border border-slate-200/80 flex flex-wrap items-baseline gap-2">
                <span class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">{{ $package->formatted_price_monthly }}</span>
                <span class="text-sm font-medium text-slate-500">/ {{ $package->billing_period ?: 'tahun' }}</span>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-50 text-amber-700 border border-amber-200">
                    {{ $package->price_note ?: 'exclude PPn' }}
                </span>
            </div>

            <div class="border-t border-slate-200/80 pt-5">
                <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-3">Fasilitas Termasuk:</p>
                <ul class="space-y-3 text-sm text-slate-700">
                    @if(!empty($package->features) && is_array($package->features))
                        @foreach($package->features as $feature)
                        <li class="flex items-start gap-2.5">
                            <div class="w-5 h-5 rounded-full bg-[#0353a4]/10 text-[#0353a4] flex items-center justify-center shrink-0 mt-0.5">
                                <svg class="w-3 h-3 fill-none stroke-current" viewBox="0 0 24 24" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 13l4 4L19 7"/></svg>
                            </div>
                            @php
                                $isHighlightedFeature = in_array($feature, [
                                    'Meeting Room Facility 4 hours/month',
                                    'PT. Address & Mail',
                                    'Akta Notaris & SK Kemenkumham Pendirian PT',
                                    'Akta Notaris & SK Kemenkumham Pendirian CV',
                                    'Virtual Office 1 Tahun di BSD City',
                                ]);
                            @endphp
                            <span class="{{ $isHighlightedFeature ? 'text-slate-900 font-bold' : 'font-medium' }}">{{ $feature }}</span>
                        </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>

        <div class="pt-8">
            @php
                $targetLink = $package->cta_link ?: ('https://wa.me/6281908797799?text=' . urlencode('Halo Admin K-Space, saya tertarik dengan paket ' . $package->name . ' (' . $package->formatted_price_monthly . ' ' . ($package->price_note ?: 'exclude PPn') . ').'));
                $isWa = str_contains($targetLink, 'wa.me') || str_contains($targetLink, 'whatsapp.com');
            @endphp
            <a href="{{ $targetLink }}" 
               @if($isWa) target="_blank" rel="noopener noreferrer" data-track-cta="whatsapp" data-cta-label="virtual_office_{{ $package->slug }}" @endif 
               class="w-full inline-flex items-center justify-center gap-2 py-3.5 px-6 rounded-2xl font-bold text-sm text-center transition bg-[#0353a4] hover:bg-[#023e7d] text-white shadow-md shadow-[#0353a4]/20 hover:shadow-lg">
                <svg class="w-4 h-4 shrink-0 fill-none stroke-current" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                </svg>
                <span>{{ $package->cta_text ?: 'Pilih ' . $package->name }}</span>
            </a>
        </div>
    </div>
    @empty
    <div class="col-span-full py-12 text-center bg-slate-50 rounded-2xl border border-slate-200">
        <p class="text-sm font-semibold text-slate-600">Belum ada paket Virtual Office yang tersedia.</p>
    </div>
    @endforelse
</div>
