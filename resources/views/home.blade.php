@extends('layouts.app')

@section('content')
    <!-- 4.2 HERO SECTION -->
    <section class="relative pt-10 pb-20 md:pt-16 md:pb-28 overflow-hidden">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <!-- Left Column: Intro & CTAs -->
                <div class="lg:col-span-7 space-y-6" data-aos="fade-up">
                    <!-- Status Badge -->
                    <div class="inline-flex items-center gap-2.5 rounded-full glass-card px-4 py-1.5 text-xs sm:text-sm font-medium text-sage-emerald shadow-xs">
                        <span class="relative flex h-2.5 w-2.5">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sage-emerald opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-sage-emerald"></span>
                        </span>
                        <span>{{ $owner['status_badge'] }}</span>
                    </div>

                    <!-- Main Heading & Typed.js Role -->
                    <div class="space-y-3">
                        <p class="text-sm sm:text-base font-semibold uppercase tracking-wider text-sage-emerald">
                            Halo, saya {{ $owner['name'] }} 👋
                        </p>
                        <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-charcoal leading-tight">
                            Membangun Solusi Web Modern sebagai <br class="hidden sm:inline" />
                            <span class="text-sage-emerald underline decoration-soft-terracotta/60 decoration-wavy decoration-2 underline-offset-8">
                                <span id="typed-role">Full-Stack Web Developer</span>
                            </span>
                        </h1>
                    </div>

                    <!-- Subtitle -->
                    <p class="text-base sm:text-lg text-slate-muted leading-relaxed max-w-2xl">
                        Mahasiswa Teknik Informatika &amp; Full-Stack Web Developer yang berfokus merancang aplikasi web yang rapi, cepat, dan fungsional—mulai dari sistem informasi berbasis <strong class="font-semibold text-charcoal">Laravel &amp; React</strong> hingga integrasi <strong class="font-semibold text-charcoal">AI &amp; Automasi Workflow</strong>.
                    </p>

                    <!-- Primary & Secondary CTA Buttons -->
                    <div class="flex flex-wrap items-center gap-4 pt-2">
                        <a
                            href="#proyek"
                            class="inline-flex items-center gap-2.5 rounded-xl bg-sage-emerald px-6 py-3.5 text-sm sm:text-base font-semibold text-white shadow-md hover:bg-sage-emerald-dark hover:-translate-y-0.5 transition-all"
                        >
                            <span>Lihat Proyek</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </a>

                        <a
                            href="{{ route('cv.download') }}"
                            class="inline-flex items-center gap-2.5 rounded-xl glass-card px-6 py-3.5 text-sm sm:text-base font-semibold text-charcoal hover:border-sage-emerald hover:text-sage-emerald hover:-translate-y-0.5 transition-all"
                        >
                            <svg class="w-4 h-4 text-sage-emerald" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <span>Unduh CV</span>
                        </a>
                    </div>

                    <!-- Quick Highlights -->
                    <div class="pt-4 grid grid-cols-3 gap-4 max-w-lg border-t border-sage-emerald/15">
                        <div>
                            <p class="text-2xl font-extrabold text-charcoal">4+</p>
                            <p class="text-xs text-slate-muted">Proyek Web Nyata</p>
                        </div>
                        <div>
                            <p class="text-2xl font-extrabold text-sage-emerald">Full-Stack</p>
                            <p class="text-xs text-slate-muted">Laravel, React &amp; AI</p>
                        </div>
                        <div>
                            <p class="text-2xl font-extrabold text-soft-terracotta">Freelance</p>
                            <p class="text-xs text-slate-muted">Mahasiswa &amp; Bisnis</p>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Profile Card Frame with Soft Decorative Accents -->
                <div class="lg:col-span-5" data-aos="fade-left" data-aos-delay="150">
                    <div class="relative mx-auto max-w-sm lg:max-w-md">
                        <!-- Soft Decorative Backdrop Shapes -->
                        <div class="absolute -top-5 -right-5 w-32 h-32 rounded-3xl bg-soft-terracotta/25 -z-10 rotate-12"></div>
                        <div class="absolute -bottom-5 -left-5 w-40 h-40 rounded-3xl bg-sage-emerald/20 -z-10 -rotate-6"></div>

                        <!-- Profile Frame Card -->
                        <div class="glass-card rounded-3xl p-6 shadow-xl border border-white/90">
                            <div class="relative aspect-4/5 w-full rounded-2xl overflow-hidden bg-gradient-to-br from-sage-emerald-light via-warm-cream to-soft-terracotta-light flex flex-col items-center justify-center p-6 text-center">
                                @if (file_exists(public_path('images/profile-cantika.webp')) || file_exists(public_path('images/profile-cantika.jpg')))
                                    <img
                                        src="{{ file_exists(public_path('images/profile-cantika.webp')) ? asset('images/profile-cantika.webp') : asset('images/profile-cantika.jpg') }}"
                                        alt="Foto Profil {{ $owner['name'] }}"
                                        class="w-full h-full object-cover rounded-xl"
                                    />
                                @else
                                    <!-- Modern Stylized Avatar Placeholder -->
                                    <div class="w-28 h-28 rounded-3xl bg-sage-emerald text-white flex items-center justify-center text-4xl font-extrabold shadow-lg mb-4">
                                        CG
                                    </div>
                                    <h2 class="text-xl font-bold text-charcoal">{{ $owner['name'] }}</h2>
                                    <p class="text-xs font-medium text-sage-emerald mt-1">@<span>{{ $owner['username'] }}</span></p>
                                    <p class="text-xs text-slate-muted mt-3 max-w-xs">
                                        {{ $owner['university'] }}
                                    </p>

                                    <div class="mt-6 flex flex-wrap justify-center gap-2">
                                        <span class="rounded-lg bg-white/80 px-3 py-1 text-xs font-semibold text-charcoal shadow-2xs">Laravel</span>
                                        <span class="rounded-lg bg-white/80 px-3 py-1 text-xs font-semibold text-charcoal shadow-2xs">React</span>
                                        <span class="rounded-lg bg-white/80 px-3 py-1 text-xs font-semibold text-charcoal shadow-2xs">Tailwind CSS</span>
                                        <span class="rounded-lg bg-white/80 px-3 py-1 text-xs font-semibold text-charcoal shadow-2xs">Gemini AI</span>
                                    </div>
                                @endif
                            </div>

                            <!-- Floating Quick Status Footer inside Profile Frame -->
                            <div class="mt-4 flex items-center justify-between px-2">
                                <div class="flex items-center gap-2.5">
                                    <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-sage-emerald-light text-sage-emerald">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                                        </svg>
                                    </span>
                                    <div>
                                        <p class="text-xs font-bold text-charcoal">Clean &amp; Scalable Code</p>
                                        <p class="text-[11px] text-slate-muted">Siap kolaborasi &amp; proyek baru</p>
                                    </div>
                                </div>
                                <a
                                    href="#kontak"
                                    class="rounded-xl bg-soft-terracotta/15 px-3 py-1.5 text-xs font-semibold text-soft-terracotta hover:bg-soft-terracotta hover:text-white transition-colors"
                                >
                                    Hire Me
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4.3 TENTANG SAYA & TECH STACK -->
    <section id="tentang" class="py-20 scroll-mt-20">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="max-w-2xl mx-auto text-center space-y-3" data-aos="fade-up">
                <span class="inline-block rounded-full bg-sage-emerald-light px-3.5 py-1 text-xs font-semibold uppercase tracking-wider text-sage-emerald">
                    Tentang Saya &amp; Keahlian
                </span>
                <h2 class="text-2xl sm:text-4xl font-extrabold text-charcoal">
                    Menggabungkan Akademik Informatika &amp; Praktik Industri
                </h2>
                <p class="text-sm sm:text-base text-slate-muted">
                    Ringkasan latar belakang dan teknologi yang saya gunakan untuk membangun solusi digital.
                </p>
            </div>

            <div class="mt-12 grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
                <!-- Bio Summary Card -->
                <div class="lg:col-span-5 flex" data-aos="fade-up" data-aos-delay="100">
                    <div class="glass-card rounded-3xl p-7 sm:p-8 shadow-sm flex flex-col justify-between w-full">
                        <div class="space-y-4">
                            <div class="inline-flex items-center gap-2.5 rounded-2xl bg-sage-emerald-light px-3.5 py-2 text-sage-emerald">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                                </svg>
                                <span class="text-xs font-bold uppercase tracking-wide">Profil Singkat</span>
                            </div>

                            <h3 class="text-xl font-bold text-charcoal">
                                {{ $owner['name'] }}
                            </h3>

                            <p class="text-sm sm:text-base text-slate-muted leading-relaxed">
                                {{ $owner['about'] }}
                            </p>

                            <div class="pt-2 space-y-2.5 text-sm">
                                <div class="flex items-center gap-3 text-charcoal">
                                    <span class="h-2 w-2 rounded-full bg-sage-emerald"></span>
                                    <span><strong>Pendidikan:</strong> Teknik Informatika — {{ $owner['university'] }}</span>
                                </div>
                                <div class="flex items-center gap-3 text-charcoal">
                                    <span class="h-2 w-2 rounded-full bg-sage-emerald"></span>
                                    <span><strong>Fokus Utama:</strong> Web Application, REST API &amp; AI Automation</span>
                                </div>
                                <div class="flex items-center gap-3 text-charcoal">
                                    <span class="h-2 w-2 rounded-full bg-soft-terracotta"></span>
                                    <span><strong>Layanan:</strong> Skripsi/Tugas Akhir, Web UMKM, Sekolah &amp; Instansi</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 pt-5 border-t border-sage-emerald/15 flex items-center justify-between">
                            <a
                                href="{{ $owner['github'] }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="inline-flex items-center gap-2 text-sm font-semibold text-sage-emerald hover:text-sage-emerald-dark"
                            >
                                <span>Lihat Repositori GitHub</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                </svg>
                            </a>
                            <a
                                href="{{ $owner['linkedin'] }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="text-sm font-semibold text-slate-muted hover:text-charcoal"
                            >
                                LinkedIn →
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Tech Stack Grouped Grid -->
                <div class="lg:col-span-7 space-y-6" data-aos="fade-up" data-aos-delay="200">
                    @foreach ($techStack as $groupName => $items)
                        <div class="glass-card rounded-3xl p-6 sm:p-7 shadow-sm">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-base sm:text-lg font-bold text-charcoal flex items-center gap-2.5">
                                    <span class="h-3 w-3 rounded-full {{ $loop->first ? 'bg-sage-emerald' : 'bg-soft-terracotta' }}"></span>
                                    <span>{{ $groupName }}</span>
                                </h3>
                                <span class="text-xs font-medium text-slate-muted">{{ count($items) }} Teknologi</span>
                            </div>

                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3.5">
                                @foreach ($items as $tech)
                                    <div class="group flex items-center gap-3 rounded-2xl bg-white/80 border border-sage-emerald/15 px-4 py-3 hover:border-sage-emerald hover:shadow-sm transition-all">
                                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-sage-emerald-light text-sage-emerald font-bold text-xs group-hover:bg-sage-emerald group-hover:text-white transition-colors">
                                            {{ strtoupper(substr($tech['name'], 0, 2)) }}
                                        </span>
                                        <span class="text-sm font-semibold text-charcoal group-hover:text-sage-emerald transition-colors">
                                            {{ $tech['name'] }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- 4.4 FEATURED PROJECTS (FOKUS VISUAL — GALLERY CARDS) -->
    <section id="proyek" class="py-20 scroll-mt-20">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header & Filter Buttons -->
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6" data-aos="fade-up">
                <div class="space-y-3 max-w-xl">
                    <span class="inline-block rounded-full bg-sage-emerald-light px-3.5 py-1 text-xs font-semibold uppercase tracking-wider text-sage-emerald">
                        Portofolio Pilihan
                    </span>
                    <h2 class="text-2xl sm:text-4xl font-extrabold text-charcoal">
                        Featured Projects
                    </h2>
                    <p class="text-sm sm:text-base text-slate-muted">
                        Kumpulan proyek aplikasi web dan integrasi AI yang telah saya bangun untuk kebutuhan akademik maupun solusi fungsional.
                    </p>
                </div>

                <!-- Interactive Category Filter (Alpine.js) -->
                <div class="inline-flex flex-wrap items-center gap-2 rounded-2xl glass-card p-1.5 self-start md:self-auto">
                    @foreach (['Semua', 'Web App', 'AI Integration'] as $category)
                        <button
                            type="button"
                            @click="activeCategory = '{{ $category }}'"
                            :class="activeCategory === '{{ $category }}'
                                ? 'bg-sage-emerald text-white shadow-xs'
                                : 'text-slate-muted hover:text-charcoal hover:bg-white/60'"
                            class="rounded-xl px-4 py-2 text-xs sm:text-sm font-semibold transition-all cursor-pointer"
                        >
                            {{ $category }}
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Gallery Cards Grid (2 Columns on Desktop, 1 Column on Mobile) -->
            <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-8" data-aos="fade-up" data-aos-delay="150">
                @foreach ($projects as $project)
                    <x-project-card :project="$project" />
                @endforeach
            </div>
        </div>
    </section>

    <!-- 4.5 DAFTAR PAKET HARGA JASA FREELANCE (PRICING CARDS) -->
    <section id="paket-jasa" class="py-20 scroll-mt-20">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="max-w-2xl mx-auto text-center space-y-3" data-aos="fade-up">
                <span class="inline-block rounded-full bg-soft-terracotta-light px-3.5 py-1 text-xs font-semibold uppercase tracking-wider text-soft-terracotta">
                    Layanan Freelance
                </span>
                <h2 class="text-2xl sm:text-4xl font-extrabold text-charcoal">
                    Paket Jasa Pembuatan Website
                </h2>
                <p class="text-sm sm:text-base text-slate-muted">
                    Estimasi harga transparan untuk mahasiswa, UMKM, sekolah, maupun instansi. Pilih paket di bawah untuk langsung berkonsultasi.
                </p>
            </div>

            <!-- 3 Pricing Cards Grid -->
            <div class="mt-14 grid grid-cols-1 lg:grid-cols-3 gap-8 items-stretch" data-aos="fade-up" data-aos-delay="150">
                @foreach ($pricing as $plan)
                    <x-pricing-card :plan="$plan" />
                @endforeach
            </div>

            <!-- Custom Consultation Note -->
            <div class="mt-10 glass-card rounded-2xl p-5 sm:p-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-center sm:text-left" data-aos="fade-up" data-aos-delay="250">
                <div class="flex flex-col sm:flex-row items-center gap-3.5">
                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-sage-emerald-light text-sage-emerald">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                        </svg>
                    </span>
                    <div>
                        <p class="text-sm font-bold text-charcoal">Masih bingung memilih paket yang sesuai dengan budget atau kebutuhan?</p>
                        <p class="text-xs text-slate-muted">Diskusikan alur sistem atau fitur aplikasi Anda terlebih dahulu secara gratis tanpa komitmen.</p>
                    </div>
                </div>
                <button
                    type="button"
                    @click="selectPackage('Lainnya')"
                    class="shrink-0 rounded-xl bg-sage-emerald/15 px-4 py-2.5 text-xs sm:text-sm font-bold text-sage-emerald hover:bg-sage-emerald hover:text-white transition-colors cursor-pointer"
                >
                    Tanya Dulu Gratis →
                </button>
            </div>
        </div>
    </section>

    <!-- 4.7 FORM KONTAK LANGSUNG (LARAVEL MAIL) -->
    <section id="kontak" class="py-20 scroll-mt-20">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
                <!-- Left Column: Direct Contact Info & Copy Email -->
                <div class="lg:col-span-5 space-y-6" data-aos="fade-up">
                    <div class="space-y-3">
                        <span class="inline-block rounded-full bg-sage-emerald-light px-3.5 py-1 text-xs font-semibold uppercase tracking-wider text-sage-emerald">
                            Hubungi Saya
                        </span>
                        <h2 class="text-2xl sm:text-4xl font-extrabold text-charcoal">
                            Mari Diskusikan Proyek atau Peluang Kolaborasi
                        </h2>
                        <p class="text-sm sm:text-base text-slate-muted leading-relaxed">
                            Baik untuk konsultasi pembuatan website freelance maupun tawaran kerja/magang, silakan kirim pesan melalui formulir di samping. Pesan akan langsung masuk ke email saya.
                        </p>
                    </div>

                    <!-- Companion Contact Cards -->
                    <div class="space-y-4 pt-2">
                        <!-- Email Card with Copy Button -->
                        <div class="glass-card rounded-2xl p-5 shadow-xs">
                            <div class="flex items-center justify-between gap-3">
                                <div class="flex items-center gap-3.5 min-w-0">
                                    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-sage-emerald-light text-sage-emerald">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </span>
                                    <div class="min-w-0">
                                        <p class="text-xs font-semibold text-slate-muted">Email Langsung</p>
                                        <p class="text-sm font-bold text-charcoal truncate">{{ $owner['email'] }}</p>
                                    </div>
                                </div>

                                <button
                                    type="button"
                                    @click="copyEmail('{{ $owner['email'] }}')"
                                    class="shrink-0 inline-flex items-center gap-1.5 rounded-xl bg-white border border-sage-emerald/25 px-3 py-2 text-xs font-semibold text-charcoal hover:border-sage-emerald hover:text-sage-emerald transition-colors cursor-pointer"
                                >
                                    <template x-if="!copiedEmail">
                                        <span class="inline-flex items-center gap-1.5">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                            </svg>
                                            <span>Salin</span>
                                        </span>
                                    </template>
                                    <template x-if="copiedEmail">
                                        <span class="inline-flex items-center gap-1 text-sage-emerald">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                            </svg>
                                            <span>Tersalin!</span>
                                        </span>
                                    </template>
                                </button>
                            </div>
                        </div>

                        <!-- GitHub & LinkedIn Quick Cards -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <a
                                href="{{ $owner['github'] }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="glass-card rounded-2xl p-4 flex items-center gap-3.5 hover:border-sage-emerald transition-all group"
                            >
                                <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-charcoal text-white group-hover:bg-sage-emerald transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.53 1.032 1.53 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/>
                                    </svg>
                                </span>
                                <div>
                                    <p class="text-xs text-slate-muted">GitHub</p>
                                    <p class="text-sm font-bold text-charcoal group-hover:text-sage-emerald">@<span>{{ $owner['username'] }}</span></p>
                                </div>
                            </a>

                            <a
                                href="{{ $owner['linkedin'] }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="glass-card rounded-2xl p-4 flex items-center gap-3.5 hover:border-sage-emerald transition-all group"
                            >
                                <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-sage-emerald text-white group-hover:bg-sage-emerald-dark transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M19 3a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h14m-.5 15.5v-5.3a3.26 3.26 0 00-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 011.4 1.4v4.93h2.75M6.88 8.56a1.68 1.68 0 001.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 00-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/>
                                    </svg>
                                </span>
                                <div>
                                    <p class="text-xs text-slate-muted">LinkedIn</p>
                                    <p class="text-sm font-bold text-charcoal group-hover:text-sage-emerald">Cantika Gustiani</p>
                                </div>
                            </a>
                        </div>

                        <!-- Quick Download CV Card for HRD -->
                        <div class="glass-card rounded-2xl p-5 border-l-4 border-l-soft-terracotta">
                            <p class="text-xs font-bold uppercase tracking-wider text-soft-terracotta">Untuk HRD &amp; Rekruter</p>
                            <p class="text-sm text-charcoal font-semibold mt-1">Butuh dokumen CV lengkap dalam format PDF?</p>
                            <a
                                href="{{ route('cv.download') }}"
                                class="mt-3 inline-flex items-center gap-2 text-xs sm:text-sm font-bold text-sage-emerald hover:text-sage-emerald-dark"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                </svg>
                                <span>Unduh CV-Cantika-Gustiani.pdf</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Contact Form -->
                <div class="lg:col-span-7" data-aos="fade-up" data-aos-delay="150">
                    <div class="glass-card rounded-3xl p-7 sm:p-9 shadow-md">
                        <h3 class="text-xl font-extrabold text-charcoal">
                            Formulir Konsultasi &amp; Kontak
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-muted mt-1">
                            Isi data di bawah ini. Pilihan paket otomatis terisi jika Anda menekan tombol pada kartu paket di atas.
                        </p>

                        <!-- Inline Feedback Banner inside Contact Section -->
                        @if (session('success'))
                            <div class="mt-5 rounded-2xl bg-sage-emerald-light border border-sage-emerald/30 p-4 flex items-start gap-3">
                                <svg class="w-5 h-5 text-sage-emerald shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <p class="text-xs sm:text-sm font-medium text-charcoal">{{ session('success') }}</p>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="mt-5 rounded-2xl bg-soft-terracotta-light border border-soft-terracotta/40 p-4 flex items-start gap-3">
                                <svg class="w-5 h-5 text-soft-terracotta shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <p class="text-xs sm:text-sm font-medium text-charcoal">{{ session('error') }}</p>
                            </div>
                        @endif

                        <form action="{{ route('contact.send') }}" method="POST" class="mt-6 space-y-5">
                            @csrf

                            <!-- Honeypot Field (Hidden from real users to catch spam bots) -->
                            <div class="hidden" aria-hidden="true">
                                <label for="website_hp">Jangan isi kolom ini</label>
                                <input type="text" name="website_hp" id="website_hp" tabindex="-1" autocomplete="off" value="">
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                <!-- Nama Lengkap -->
                                <div>
                                    <label for="name" class="block text-xs font-bold uppercase tracking-wider text-charcoal mb-2">
                                        Nama Lengkap <span class="text-soft-terracotta">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        id="name"
                                        name="name"
                                        value="{{ old('name') }}"
                                        required
                                        placeholder="Contoh: Budi Santoso"
                                        class="w-full rounded-xl bg-white/90 border {{ $errors->has('name') ? 'border-soft-terracotta ring-2 ring-soft-terracotta/20' : 'border-sage-emerald/20 focus:border-sage-emerald' }} px-4 py-3 text-sm text-charcoal placeholder:text-slate-muted/60 focus:outline-none focus:ring-2 focus:ring-sage-emerald/20 transition-all"
                                    />
                                    @error('name')
                                        <p class="mt-1.5 text-xs font-medium text-soft-terracotta">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Alamat Email -->
                                <div>
                                    <label for="email" class="block text-xs font-bold uppercase tracking-wider text-charcoal mb-2">
                                        Alamat Email <span class="text-soft-terracotta">*</span>
                                    </label>
                                    <input
                                        type="email"
                                        id="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        required
                                        placeholder="nama@email.com"
                                        class="w-full rounded-xl bg-white/90 border {{ $errors->has('email') ? 'border-soft-terracotta ring-2 ring-soft-terracotta/20' : 'border-sage-emerald/20 focus:border-sage-emerald' }} px-4 py-3 text-sm text-charcoal placeholder:text-slate-muted/60 focus:outline-none focus:ring-2 focus:ring-sage-emerald/20 transition-all"
                                    />
                                    @error('email')
                                        <p class="mt-1.5 text-xs font-medium text-soft-terracotta">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Subjek / Pilihan Keperluan (Synced with Alpine selectedPackage) -->
                            <div>
                                <label for="subject" class="block text-xs font-bold uppercase tracking-wider text-charcoal mb-2">
                                    Subjek / Pilihan Keperluan <span class="text-soft-terracotta">*</span>
                                </label>
                                <select
                                    id="subject"
                                    name="subject"
                                    x-model="selectedPackage"
                                    required
                                    class="w-full rounded-xl bg-white/90 border {{ $errors->has('subject') ? 'border-soft-terracotta ring-2 ring-soft-terracotta/20' : 'border-sage-emerald/20 focus:border-sage-emerald' }} px-4 py-3 text-sm font-medium text-charcoal focus:outline-none focus:ring-2 focus:ring-sage-emerald/20 transition-all"
                                >
                                    @foreach ($contactSubjects as $value => $label)
                                        <option value="{{ $value }}">{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('subject')
                                    <p class="mt-1.5 text-xs font-medium text-soft-terracotta">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Pesan / Detail Kebutuhan -->
                            <div>
                                <label for="message" class="block text-xs font-bold uppercase tracking-wider text-charcoal mb-2">
                                    Pesan / Detail Kebutuhan <span class="text-soft-terracotta">*</span>
                                </label>
                                <textarea
                                    id="message"
                                    name="message"
                                    rows="5"
                                    required
                                    minlength="10"
                                    placeholder="Ceritakan gambaran proyek website, fitur yang dibutuhkan, target waktu pengerjaan, atau informasi tawaran kerja..."
                                    class="w-full rounded-xl bg-white/90 border {{ $errors->has('message') ? 'border-soft-terracotta ring-2 ring-soft-terracotta/20' : 'border-sage-emerald/20 focus:border-sage-emerald' }} px-4 py-3 text-sm text-charcoal placeholder:text-slate-muted/60 focus:outline-none focus:ring-2 focus:ring-sage-emerald/20 transition-all"
                                >{{ old('message') }}</textarea>
                                @error('message')
                                    <p class="mt-1.5 text-xs font-medium text-soft-terracotta">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="pt-2 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                                <p class="text-xs text-slate-muted">
                                    🔒 Data Anda aman &amp; hanya digunakan untuk membalas konsultasi.
                                </p>
                                <button
                                    type="submit"
                                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-sage-emerald px-7 py-3.5 text-sm font-bold text-white shadow-md hover:bg-sage-emerald-dark hover:-translate-y-0.5 transition-all cursor-pointer"
                                >
                                    <span>Kirim Pesan</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
