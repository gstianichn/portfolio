<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Cantika Gustiani — Full-Stack Web Developer & Freelance Web Services' }}</title>
    <meta name="description" content="Portofolio resmi Cantika Gustiani (gstianichn) — Mahasiswa Teknik Informatika UNPI Cianjur & Full-Stack Web Developer. Menerima jasa pembuatan website Laravel, React, dan integrasi AI.">
    <meta name="author" content="Cantika Gustiani">

    <!-- Open Graph / Social Media -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Cantika Gustiani — Full-Stack Web Developer & Freelance Services">
    <meta property="og:description" content="Jelajahi portofolio proyek web aplikasi dan pilihan paket jasa pembuatan website untuk mahasiswa, UMKM, sekolah, dan instansi.">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/og-preview.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body
    x-data="{
        selectedPackage: '{{ old('subject', 'Paket PRO') }}',
        activeCategory: 'Semua',
        copiedEmail: false,
        selectPackage(pkgName) {
            this.selectedPackage = pkgName;
            const contactEl = document.getElementById('kontak');
            if (contactEl) {
                contactEl.scrollIntoView({ behavior: 'smooth' });
            }
        },
        copyEmail(email) {
            navigator.clipboard.writeText(email);
            this.copiedEmail = true;
            setTimeout(() => this.copiedEmail = false, 2500);
        }
    }"
    class="min-h-screen flex flex-col bg-warm-cream text-charcoal antialiased selection:bg-sage-emerald selection:text-white overflow-x-hidden"
>
    <!-- Decorative Ambient Background Blobs -->
    <div class="fixed inset-0 -z-10 pointer-events-none overflow-hidden">
        <div class="absolute -top-32 -left-32 w-96 h-96 rounded-full bg-sage-emerald/10 blur-3xl"></div>
        <div class="absolute top-1/3 -right-32 w-96 h-96 rounded-full bg-soft-terracotta/10 blur-3xl"></div>
        <div class="absolute -bottom-32 left-1/4 w-96 h-96 rounded-full bg-sage-emerald/10 blur-3xl"></div>
    </div>

    <!-- Flash Message Toast -->
    @if (session('success') || session('error'))
        <div
            x-data="{ show: true }"
            x-show="show"
            x-init="setTimeout(() => show = false, 6000)"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-4"
            class="fixed bottom-6 right-6 z-50 max-w-md"
        >
            <div class="glass-card rounded-2xl p-4 shadow-xl border {{ session('success') ? 'border-sage-emerald/40' : 'border-soft-terracotta/50' }} flex items-start gap-3">
                @if (session('success'))
                    <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-sage-emerald text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </span>
                @else
                    <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-soft-terracotta text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M12 3a9 9 0 100 18 9 9 0 000-18z"/>
                        </svg>
                    </span>
                @endif
                <div class="flex-1 text-sm">
                    <p class="font-semibold text-charcoal">
                        {{ session('success') ? 'Berhasil!' : 'Perhatian' }}
                    </p>
                    <p class="text-slate-muted mt-0.5">
                        {{ session('success') ?? session('error') }}
                    </p>
                </div>
                <button @click="show = false" class="text-slate-muted hover:text-charcoal">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    @endif

    <!-- Sticky Glassmorphism Navbar -->
    <x-navbar :owner="$owner" />

    <!-- Main Content -->
    <main class="flex-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <x-footer :owner="$owner" />
</body>
</html>
