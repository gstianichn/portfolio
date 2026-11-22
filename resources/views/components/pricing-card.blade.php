@props(['plan'])

<div
    class="relative glass-card rounded-3xl p-7 sm:p-8 flex flex-col justify-between transition-all duration-300 hover:-translate-y-1.5 hover:shadow-xl {{ $plan['is_popular'] ? 'ring-2 ring-soft-terracotta shadow-lg bg-white/90' : 'shadow-sm' }}"
>
    <!-- Popular Badge (Soft Terracotta) -->
    @if ($plan['is_popular'] && !empty($plan['badge']))
        <div class="absolute -top-3.5 right-6">
            <span class="inline-flex items-center gap-1.5 rounded-full bg-soft-terracotta px-3.5 py-1 text-xs font-bold text-white shadow-sm">
                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
                <span>{{ $plan['badge'] }}</span>
            </span>
        </div>
    @endif

    <div class="space-y-6">
        <!-- Package Title & Subtitle -->
        <div>
            <h3 class="text-xl font-extrabold text-charcoal">
                {{ $plan['name'] }}
            </h3>
            <p class="text-xs sm:text-sm font-medium text-slate-muted mt-1">
                {{ $plan['subtitle'] }}
            </p>
        </div>

        <!-- Price Display -->
        <div class="rounded-2xl {{ $plan['is_popular'] ? 'bg-soft-terracotta-light/80 border border-soft-terracotta/25' : 'bg-sage-emerald-light/60 border border-sage-emerald/15' }} p-4">
            <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-muted">
                Estimasi Investasi
            </p>
            <p class="text-xl sm:text-2xl font-extrabold text-charcoal mt-0.5">
                {{ $plan['price'] }}
            </p>
        </div>

        <!-- Suitable For List -->
        <div class="space-y-2.5">
            <p class="text-xs font-bold uppercase tracking-wider text-sage-emerald">
                Cocok Untuk:
            </p>
            <ul class="space-y-2">
                @foreach ($plan['suitable_for'] as $item)
                    <li class="flex items-start gap-2.5 text-sm text-charcoal">
                        <svg class="w-4 h-4 text-sage-emerald shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>{{ $item }}</span>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Terms & Conditions List -->
        <div class="pt-4 border-t border-sage-emerald/15 space-y-2.5">
            <p class="text-xs font-bold uppercase tracking-wider text-slate-muted">
                Ketentuan Paket:
            </p>
            <ul class="space-y-2">
                @foreach ($plan['terms'] as $term)
                    <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-muted">
                        <span class="h-1.5 w-1.5 rounded-full bg-soft-terracotta shrink-0 mt-2"></span>
                        <span>{{ $term }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- CTA Button: Auto-select package & scroll to Contact form -->
    <div class="mt-8 pt-4">
        <button
            type="button"
            @click="selectPackage('{{ $plan['id'] }}')"
            class="w-full inline-flex items-center justify-center gap-2 rounded-xl px-5 py-3.5 text-sm font-bold transition-all cursor-pointer {{ $plan['is_popular'] ? 'bg-sage-emerald text-white shadow-md hover:bg-sage-emerald-dark' : 'bg-white/90 text-charcoal border border-sage-emerald/30 hover:bg-sage-emerald hover:text-white hover:border-sage-emerald' }}"
        >
            <span>Pilih Paket / Konsultasi</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
            </svg>
        </button>
    </div>
</div>
