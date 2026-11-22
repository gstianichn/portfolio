@props(['project'])

<article
    x-show="activeCategory === 'Semua' || activeCategory === '{{ $project['category'] }}'"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-95"
    x-transition:enter-end="opacity-100 scale-100"
    class="group glass-card rounded-3xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col"
>
    <!-- Large Visual Thumbnail / Screenshot Frame -->
    <div class="relative aspect-16/10 w-full overflow-hidden bg-gradient-to-br from-sage-emerald-light via-warm-cream to-soft-terracotta-light border-b border-sage-emerald/10">
        <!-- Browser Window Top Bar Decoration -->
        <div class="absolute top-3 left-3 right-3 z-10 flex items-center justify-between rounded-xl bg-white/85 backdrop-blur-md px-3 py-1.5 shadow-2xs border border-white/80">
            <div class="flex items-center gap-1.5">
                <span class="h-2.5 w-2.5 rounded-full bg-soft-terracotta/80"></span>
                <span class="h-2.5 w-2.5 rounded-full bg-amber-400/80"></span>
                <span class="h-2.5 w-2.5 rounded-full bg-sage-emerald/80"></span>
            </div>
            <span class="text-[11px] font-medium text-slate-muted truncate max-w-[180px]">
                {{ $project['live_url'] ? parse_url($project['live_url'], PHP_URL_HOST) : strtolower(str_replace(' ', '-', $project['title'])) . '.app' }}
            </span>
            <span class="rounded-md bg-sage-emerald-light px-2 py-0.5 text-[10px] font-bold text-sage-emerald">
                {{ $project['category'] }}
            </span>
        </div>

        @if (!empty($project['image']) && file_exists(public_path($project['image'])))
            <img
                src="{{ asset($project['image']) }}"
                alt="Screenshot Proyek {{ $project['title'] }}"
                loading="lazy"
                class="w-full h-full object-cover object-top pt-11 group-hover:scale-105 transition-transform duration-500"
            />
        @else
            <!-- Stylized Visual Mockup Preview when image file is not yet added -->
            <div class="w-full h-full pt-12 pb-6 px-6 flex flex-col justify-between">
                <div class="my-auto text-center space-y-2">
                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-sage-emerald text-white shadow-md group-hover:scale-110 transition-transform">
                        @if ($project['category'] === 'AI Integration')
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                            </svg>
                        @else
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        @endif
                    </div>
                    <h4 class="text-lg font-extrabold text-charcoal">{{ $project['title'] }}</h4>
                    <p class="text-xs text-slate-muted">Preview Antarmuka Aplikasi</p>
                </div>

                <!-- Mini UI Skeleton Bars for Visual Depth -->
                <div class="grid grid-cols-3 gap-2 opacity-75">
                    <div class="h-2 rounded-full bg-sage-emerald/30"></div>
                    <div class="h-2 rounded-full bg-soft-terracotta/30"></div>
                    <div class="h-2 rounded-full bg-sage-emerald/20"></div>
                </div>
            </div>
        @endif
    </div>

    <!-- Card Body -->
    <div class="p-6 sm:p-7 flex-1 flex flex-col justify-between space-y-5">
        <div class="space-y-3">
            <div class="flex items-start justify-between gap-3">
                <h3 class="text-xl font-extrabold text-charcoal group-hover:text-sage-emerald transition-colors">
                    {{ $project['title'] }}
                </h3>
                @if (!empty($project['live_url']))
                    <span class="inline-flex items-center gap-1 rounded-full bg-sage-emerald-light px-2.5 py-0.5 text-[11px] font-semibold text-sage-emerald">
                        <span class="h-1.5 w-1.5 rounded-full bg-sage-emerald"></span>
                        Live
                    </span>
                @endif
            </div>

            <p class="text-sm text-slate-muted leading-relaxed line-clamp-2">
                {{ $project['description'] }}
            </p>
        </div>

        <div class="space-y-5">
            <!-- Technology Tags -->
            <div class="flex flex-wrap gap-2">
                @foreach ($project['tags'] as $tag)
                    <span class="rounded-lg bg-white/90 border border-sage-emerald/15 px-2.5 py-1 text-xs font-semibold text-charcoal">
                        {{ $tag }}
                    </span>
                @endforeach
            </div>

            <!-- Action Buttons (Live Demo & GitHub) -->
            <div class="pt-4 border-t border-sage-emerald/15 flex items-center gap-3">
                @if (!empty($project['live_url']))
                    <a
                        href="{{ $project['live_url'] }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="flex-1 inline-flex items-center justify-center gap-2 rounded-xl bg-sage-emerald px-4 py-2.5 text-xs sm:text-sm font-semibold text-white shadow-xs hover:bg-sage-emerald-dark transition-colors"
                    >
                        <span>Live Demo</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                        </svg>
                    </a>
                @endif

                @if (!empty($project['github_url']))
                    <a
                        href="{{ $project['github_url'] }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="{{ empty($project['live_url']) ? 'flex-1' : '' }} inline-flex items-center justify-center gap-2 rounded-xl bg-white/90 border border-sage-emerald/25 px-4 py-2.5 text-xs sm:text-sm font-semibold text-charcoal hover:border-sage-emerald hover:text-sage-emerald transition-colors"
                    >
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.53 1.032 1.53 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/>
                        </svg>
                        <span>GitHub</span>
                    </a>
                @endif
            </div>
        </div>
    </div>
</article>
