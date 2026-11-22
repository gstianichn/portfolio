@props(['owner'])

@php
    $isStatic = config('portfolio.static_form.enabled', false);
    $cvHref = $isStatic ? './cv/CV-Cantika-Gustiani.pdf' : route('cv.download');
@endphp

<header
    x-data="{ mobileMenuOpen: false, scrolled: false }"
    @scroll.window="scrolled = (window.pageYOffset > 20)"
    :class="scrolled ? 'glass-navbar shadow-sm py-3.5' : 'bg-transparent py-5'"
    class="sticky top-0 z-40 w-full transition-all duration-300"
>
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">
            <!-- Brand Logo -->
            <a href="#" class="flex items-center gap-2.5 group">
                <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-sage-emerald text-white font-bold text-lg shadow-sm group-hover:bg-sage-emerald-dark transition-colors">
                    C
                </span>
                <span class="text-xl font-extrabold tracking-tight text-charcoal">
                    Cantika<span class="text-sage-emerald">.</span>
                </span>
            </a>

            <!-- Desktop Navigation Links -->
            <nav class="hidden md:flex items-center gap-8">
                <a href="#tentang" class="text-sm font-medium text-slate-muted hover:text-sage-emerald transition-colors">
                    Tentang
                </a>
                <a href="#proyek" class="text-sm font-medium text-slate-muted hover:text-sage-emerald transition-colors">
                    Proyek
                </a>
                <a href="#paket-jasa" class="text-sm font-medium text-slate-muted hover:text-sage-emerald transition-colors">
                    Paket Jasa
                </a>
                <a href="#kontak" class="text-sm font-medium text-slate-muted hover:text-sage-emerald transition-colors">
                    Kontak
                </a>
            </nav>

            <!-- Desktop CTA Button (Unduh CV) -->
            <div class="hidden md:flex items-center gap-3">
                <a
                    href="{{ $cvHref }}"
                    @if ($isStatic) download="CV-Cantika-Gustiani.pdf" @endif
                    class="inline-flex items-center gap-2 rounded-xl bg-sage-emerald px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-sage-emerald-dark focus:outline-none focus:ring-2 focus:ring-sage-emerald/40 transition-all"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                    </svg>
                    <span>Unduh CV</span>
                </a>
            </div>

            <!-- Mobile Hamburger Button -->
            <div class="flex md:hidden">
                <button
                    @click="mobileMenuOpen = !mobileMenuOpen"
                    type="button"
                    class="inline-flex items-center justify-center rounded-xl p-2.5 text-charcoal hover:bg-sage-emerald-light/60 focus:outline-none transition-colors"
                    aria-label="Toggle navigation menu"
                >
                    <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-cloak x-show="mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Dropdown Menu -->
    <div
        x-cloak
        x-show="mobileMenuOpen"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="md:hidden px-4 pt-3 pb-5"
    >
        <div class="glass-card rounded-2xl p-4 shadow-lg space-y-2">
            <a
                @click="mobileMenuOpen = false"
                href="#tentang"
                class="block rounded-xl px-3.5 py-2.5 text-sm font-medium text-charcoal hover:bg-sage-emerald-light hover:text-sage-emerald transition-colors"
            >
                Tentang Saya
            </a>
            <a
                @click="mobileMenuOpen = false"
                href="#proyek"
                class="block rounded-xl px-3.5 py-2.5 text-sm font-medium text-charcoal hover:bg-sage-emerald-light hover:text-sage-emerald transition-colors"
            >
                Proyek Unggulan
            </a>
            <a
                @click="mobileMenuOpen = false"
                href="#paket-jasa"
                class="block rounded-xl px-3.5 py-2.5 text-sm font-medium text-charcoal hover:bg-sage-emerald-light hover:text-sage-emerald transition-colors"
            >
                Paket Jasa Freelance
            </a>
            <a
                @click="mobileMenuOpen = false"
                href="#kontak"
                class="block rounded-xl px-3.5 py-2.5 text-sm font-medium text-charcoal hover:bg-sage-emerald-light hover:text-sage-emerald transition-colors"
            >
                Kontak
            </a>
            <div class="pt-2 border-t border-sage-emerald/15">
                <a
                    href="{{ $cvHref }}"
                    @if ($isStatic) download="CV-Cantika-Gustiani.pdf" @endif
                    class="flex w-full items-center justify-center gap-2 rounded-xl bg-sage-emerald px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-sage-emerald-dark transition-colors"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                    </svg>
                    <span>Unduh CV (PDF)</span>
                </a>
            </div>
        </div>
    </div>
</header>
