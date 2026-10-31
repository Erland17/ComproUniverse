<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $company['name'] }} | {{ $company['tagline'] }}</title>
    <meta name="description" content="{{ $company['subtagline'] }}">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;0,800;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Vite CSS/JS (Vue 3 + Tailwind CSS v4) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .font-serif-luxury {
            font-family: 'Playfair Display', Georgia, serif;
        }
        .hero-pattern {
            background-color: #081913;
            background-image: 
                radial-gradient(rgba(197, 155, 39, 0.14) 1px, transparent 0),
                radial-gradient(rgba(20, 56, 44, 0.4) 1px, transparent 0);
            background-size: 32px 32px, 16px 16px;
        }
        [v-cloak] { display: none; }
    </style>
</head>
<body class="bg-[#faf8f4] text-stone-800 antialiased selection:bg-[#c59b27] selection:text-white" x-data="{ mobileMenuOpen: false }">

    <div id="app" v-cloak>
        <!-- TOP ANNOUNCEMENT BAR (PRECISION SPACING) -->
        <div class="bg-[#05130e] text-stone-300 text-xs py-2 px-4 sm:px-6 lg:px-8 border-b border-[#1b3d32]">
            <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-2">
                <div class="flex flex-wrap items-center justify-center sm:justify-start gap-2.5">
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-[#14382c] border border-[#c59b27]/40 text-[#dfb74c] text-[11px] font-semibold">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                        @{{ t('topBar.delivery') }}
                    </span>
                    <span class="text-stone-400 text-[11px]">📍 @{{ t('topBar.hubs') }}</span>
                </div>
                
                <div class="flex items-center gap-3 text-[11px]">
                    <a href="{{ $company['tokopedia'] }}" target="_blank" rel="noopener" class="text-emerald-400 hover:text-white transition flex items-center gap-1 font-semibold">
                        <span>@{{ t('topBar.tokopedia') }}</span>
                    </a>
                    <span class="text-stone-600">•</span>
                    <a href="{{ $company['instagram'] }}" target="_blank" rel="noopener" class="text-[#dfb74c] hover:text-white font-semibold flex items-center gap-1 transition">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        <span>{{ $company['instagram_handle'] }}</span>
                    </a>
                    <span class="text-stone-600">•</span>
                    <language-switcher></language-switcher>
                </div>
            </div>
        </div>

        <!-- MAIN NAVBAR (BALANCED 3-COLUMN LAYOUT) -->
        <header class="sticky top-0 z-50 bg-[#0a1f18]/98 backdrop-blur-md border-b border-[#1b3d32] shadow-xl">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-22 sm:h-24">
                    
                    <!-- COLUMN 1: EXACT TUNGBO LOGO -->
                    <div class="flex-shrink-0">
                        <tungbo-logo></tungbo-logo>
                    </div>

                    <!-- COLUMN 2: CENTER-ALIGNED NAVIGATION MENU -->
                    <nav class="hidden xl:flex items-center justify-center gap-6 2xl:gap-8 text-xs font-semibold tracking-wider text-stone-200 uppercase">
                        <a href="#hero" class="hover:text-[#dfb74c] transition py-1">@{{ t('nav.home') }}</a>
                        <a href="#products" class="hover:text-[#dfb74c] transition py-1">@{{ t('nav.products') }}</a>
                        <a href="#catering-portfolio" class="hover:text-[#dfb74c] transition py-1 whitespace-nowrap">@{{ t('nav.catering') }}</a>
                        <a href="#services" class="hover:text-[#dfb74c] transition py-1 whitespace-nowrap">@{{ t('nav.services') }}</a>
                        <a href="#about" class="hover:text-[#dfb74c] transition py-1 whitespace-nowrap">@{{ t('nav.about') }}</a>
                        <a href="#testimonials" class="hover:text-[#dfb74c] transition py-1">@{{ t('nav.testimonials') }}</a>
                        <a href="#contact" class="hover:text-[#dfb74c] transition py-1">@{{ t('nav.contact') }}</a>
                    </nav>

                    <!-- COLUMN 3: RIGHT ACTION BUTTON (TOKOPEDIA) -->
                    <div class="hidden sm:flex items-center flex-shrink-0">
                        <a href="{{ $company['tokopedia'] }}" target="_blank" rel="noopener" class="px-4 py-2 sm:px-5 sm:py-2.5 rounded-xl bg-gradient-to-r from-emerald-600 to-teal-600 hover:brightness-110 text-white font-bold text-xs tracking-wider shadow-md transition flex items-center gap-2">
                            <span>Tokopedia</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </a>
                    </div>

                    <!-- Mobile Menu Button -->
                    <div class="flex xl:hidden items-center gap-2">
                        <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="text-stone-300 hover:text-white p-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="!mobileMenuOpen">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="mobileMenuOpen">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>

                </div>
            </div>

            <!-- Mobile Drawer -->
            <div x-show="mobileMenuOpen" @click.outside="mobileMenuOpen = false" class="xl:hidden bg-[#071913] border-b border-[#1b3d32] px-6 pt-4 pb-6 space-y-3">
                <a @click="mobileMenuOpen = false" href="#hero" class="block text-stone-200 hover:text-[#dfb74c] py-2 text-sm font-semibold">@{{ t('nav.home') }}</a>
                <a @click="mobileMenuOpen = false" href="#products" class="block text-stone-200 hover:text-[#dfb74c] py-2 text-sm font-semibold">@{{ t('nav.products') }}</a>
                <a @click="mobileMenuOpen = false" href="#catering-portfolio" class="block text-stone-200 hover:text-[#dfb74c] py-2 text-sm font-semibold">@{{ t('nav.catering') }}</a>
                <a @click="mobileMenuOpen = false" href="#services" class="block text-stone-200 hover:text-[#dfb74c] py-2 text-sm font-semibold">@{{ t('nav.services') }}</a>
                <a @click="mobileMenuOpen = false" href="#about" class="block text-stone-200 hover:text-[#dfb74c] py-2 text-sm font-semibold">@{{ t('nav.about') }}</a>
                <a @click="mobileMenuOpen = false" href="#testimonials" class="block text-stone-200 hover:text-[#dfb74c] py-2 text-sm font-semibold">@{{ t('nav.testimonials') }}</a>
                <a @click="mobileMenuOpen = false" href="#contact" class="block text-[#dfb74c] py-2 text-sm font-semibold">@{{ t('nav.contact') }}</a>
                <div class="pt-2">
                    <a href="{{ $company['tokopedia'] }}" target="_blank" class="w-full py-3 text-center rounded-xl bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-bold text-xs block shadow">
                        Buka Tokopedia @tungbobenhil
                    </a>
                </div>
            </div>
        </header>

        <!-- SECTION 1: HERO SECTION -->
        <section id="hero" class="relative hero-pattern text-white overflow-hidden py-16 sm:py-24 lg:py-28 border-b border-[#1b3d32]">
            <div class="absolute -top-32 right-0 w-[500px] h-[500px] bg-[#c59b27]/15 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-[#14382c]/50 rounded-full blur-3xl pointer-events-none"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="grid lg:grid-cols-12 gap-12 items-center">
                    
                    <!-- Copywriting Column -->
                    <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#123126] border border-[#c59b27]/40 text-[#dfb74c] text-xs font-semibold uppercase tracking-wider shadow-sm">
                            <span class="w-2 h-2 rounded-full bg-[#dfb74c] animate-ping"></span>
                            @{{ t('hero.badge') }}
                        </div>

                        <h1 class="font-serif-luxury text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight tracking-tight">
                            @{{ t('hero.title1') }} <br class="hidden sm:inline">
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#edd387] via-[#dfb74c] to-[#c59b27]">@{{ t('hero.title2') }}</span> @{{ t('hero.title3') }}
                        </h1>

                        <p class="text-stone-300 text-base sm:text-lg max-w-2xl leading-relaxed">
                            @{{ t('hero.desc') }}
                        </p>

                        <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start pt-2">
                            <a href="#products" class="px-8 py-4 rounded-xl bg-gradient-to-r from-[#c59b27] via-[#dfb74c] to-[#c59b27] text-[#0a1f18] font-bold text-base shadow-xl shadow-black/40 hover:brightness-110 active:scale-95 transition text-center flex items-center justify-center gap-2 group">
                                <span>@{{ t('hero.btnCatalog') }}</span>
                                <svg class="w-4 h-4 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </a>
                            <a href="#catering-portfolio" class="px-8 py-4 rounded-xl bg-[#14382c]/80 hover:bg-[#1b4d3e] text-white border border-[#c59b27]/30 font-semibold text-base transition text-center flex items-center justify-center gap-2">
                                <span>@{{ t('hero.btnCatering') }}</span>
                            </a>
                        </div>

                        <!-- 3 Badges -->
                        <div class="pt-8 border-t border-[#1a382e] grid grid-cols-3 gap-4 text-left">
                            <div>
                                <p class="text-2xl font-bold text-[#dfb74c] font-serif-luxury">@{{ t('hero.trustHubs') }}</p>
                                <p class="text-xs text-stone-300 font-medium">@{{ t('hero.trustHubsSub') }}</p>
                            </div>
                            <div>
                                <p class="text-2xl font-bold text-[#dfb74c] font-serif-luxury">@{{ t('hero.trustCold') }}</p>
                                <p class="text-xs text-stone-300 font-medium">@{{ t('hero.trustColdSub') }}</p>
                            </div>
                            <div>
                                <p class="text-2xl font-bold text-[#dfb74c] font-serif-luxury">@{{ t('hero.trustHalal') }}</p>
                                <p class="text-xs text-stone-300 font-medium">@{{ t('hero.trustHalalSub') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- VUE COMPONENT: PROMO CARD -->
                    <div class="lg:col-span-5">
                        <meat-showcase></meat-showcase>
                    </div>

                </div>
            </div>
        </section>

        <!-- SECTION 2: STATS & MILESTONES -->
        <section class="bg-[#14382c] border-b border-[#234b3c] py-12 text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach($stats as $stat)
                    <div class="border-l-2 border-[#c59b27] pl-5">
                        <p class="font-serif-luxury text-3xl sm:text-4xl font-bold text-[#dfb74c]">{{ $stat['value'] }}</p>
                        <p class="text-sm font-semibold text-white mt-1">{{ $stat['label'] }}</p>
                        <p class="text-xs text-stone-300 mt-1">{{ $stat['desc'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- SECTION 3: VUE INTERACTIVE PRODUCTS FILTER -->
        <section id="products" class="py-24 bg-[#081913] text-white hero-pattern">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="text-center max-w-3xl mx-auto mb-12">
                    <span class="text-[#dfb74c] font-bold text-xs uppercase tracking-widest bg-[#14382c] px-3.5 py-1 rounded-full border border-[#c59b27]/40">@{{ t('productsSec.badge') }}</span>
                    <h2 class="font-serif-luxury text-3xl sm:text-5xl font-bold text-white mt-3">
                        @{{ t('productsSec.title') }}
                    </h2>
                    <p class="text-stone-300 text-sm sm:text-base mt-3">
                        @{{ t('productsSec.subtitle') }}
                    </p>
                </div>

                <!-- VUE COMPONENT: PRODUCT FILTER -->
                <product-filter :initial-products='@json($products)'></product-filter>

                <!-- Retail Stores & Tokopedia Benhil Banner -->
                <div class="mt-16 bg-gradient-to-r from-[#14382c] to-[#0f2d23] border border-[#c59b27]/40 rounded-2xl p-8 flex flex-col md:flex-row items-center justify-between gap-6 shadow-xl">
                    <div>
                        <h3 class="font-serif-luxury text-2xl font-bold text-white">@{{ t('tokopediaBanner.title') }}</h3>
                        <p class="text-stone-300 text-sm mt-1">
                            @{{ t('tokopediaBanner.subtitle') }}
                        </p>
                    </div>
                    <div class="flex flex-wrap items-center gap-3">
                        <a href="{{ $company['tokopedia'] }}" target="_blank" class="px-6 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 text-white rounded-xl text-xs font-bold hover:brightness-110 transition shadow-lg flex items-center gap-2">
                            <span>@{{ t('tokopediaBanner.btn') }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </a>
                    </div>
                </div>

            </div>
        </section>

        <!-- SECTION 4: PORTOFOLIO CATERING EVENT -->
        <section id="catering-portfolio" class="py-24 bg-white border-b border-stone-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="text-[#c59b27] font-bold text-xs uppercase tracking-widest bg-[#c59b27]/10 px-3 py-1 rounded">@{{ t('cateringSec.badge') }}</span>
                    <h2 class="font-serif-luxury text-3xl sm:text-4xl font-bold text-[#0a1f18] mt-2">
                        @{{ t('cateringSec.title') }}
                    </h2>
                    <p class="text-stone-600 text-sm mt-3">
                        @{{ t('cateringSec.subtitle') }}
                    </p>
                    <div class="w-16 h-1 bg-[#c59b27] mx-auto mt-4"></div>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    @foreach($catering_portfolios as $porto)
                    <div class="bg-[#faf8f4] border border-stone-200 rounded-2xl overflow-hidden hover:border-[#14382c] hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                        <div>
                            <div class="h-60 overflow-hidden relative">
                                <img src="{{ $porto['image'] }}" alt="{{ $porto['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                                <span class="absolute top-3 left-3 text-[10px] font-bold px-3 py-1 rounded-full bg-[#0a1f18]/80 text-[#dfb74c] backdrop-blur-sm border border-[#c59b27]/30 uppercase">
                                    {{ $porto['tag'] }}
                                </span>
                                <span class="absolute bottom-3 right-3 text-[11px] font-semibold px-2.5 py-0.5 rounded bg-black/70 text-white backdrop-blur-sm">
                                    {{ $porto['guest_count'] }}
                                </span>
                            </div>

                            <div class="p-6">
                                <span class="text-[11px] text-stone-500 font-mono">{{ $porto['client'] }}</span>
                                <h3 class="font-serif-luxury text-xl font-bold text-[#0a1f18] mt-1 mb-3 leading-snug">
                                    {{ $porto['title'] }}
                                </h3>
                                <p class="text-xs text-stone-600 leading-relaxed">
                                    {{ $porto['description'] }}
                                </p>
                            </div>
                        </div>

                        <div class="px-6 pb-6 pt-2 border-t border-stone-200">
                            <a href="#contact" class="w-full py-2.5 rounded-lg bg-[#14382c] group-hover:bg-[#dfb74c] text-white group-hover:text-[#0a1f18] text-xs font-bold text-center block transition">
                                @{{ t('cateringSec.btnEvent') }} &rarr;
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="mt-12 text-center">
                    <p class="text-xs text-stone-500 mb-2">@{{ t('cateringSec.igHint') }}</p>
                    <a href="{{ $company['instagram'] }}" target="_blank" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#14382c] hover:text-[#c59b27] transition">
                        <span>@{{ t('cateringSec.igBtn') }} &rarr;</span>
                    </a>
                </div>

            </div>
        </section>

        <!-- SECTION 5: SERVICES & SOLUTIONS -->
        <section id="services" class="py-24 bg-[#faf8f4] border-b border-stone-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-16 gap-6">
                    <div>
                        <span class="text-[#c59b27] font-bold text-xs uppercase tracking-widest bg-[#c59b27]/10 px-3 py-1 rounded">@{{ t('servicesSec.badge') }}</span>
                        <h2 class="font-serif-luxury text-3xl sm:text-4xl font-bold text-[#0a1f18] mt-2">
                            @{{ t('servicesSec.title') }}
                        </h2>
                    </div>
                    <p class="text-stone-600 text-sm max-w-md">
                        @{{ t('servicesSec.subtitle') }}
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach($services as $srv)
                    <div class="bg-white border border-stone-200 rounded-2xl overflow-hidden flex flex-col justify-between hover:border-[#14382c] hover:shadow-xl transition group">
                        <div>
                            <div class="h-44 overflow-hidden relative">
                                <img src="{{ $srv['image'] }}" alt="{{ $srv['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                                <span class="absolute top-3 left-3 text-[10px] font-semibold px-2.5 py-1 rounded bg-[#0a1f18]/80 text-[#dfb74c] backdrop-blur-sm">
                                    {{ $srv['badge'] }}
                                </span>
                            </div>

                            <div class="p-6">
                                <h3 class="font-serif-luxury text-lg font-bold text-[#0a1f18] mb-2 leading-snug">
                                    {{ $srv['title'] }}
                                </h3>
                                <p class="text-xs text-stone-600 leading-relaxed mb-4">
                                    {{ $srv['desc'] }}
                                </p>
                            </div>
                        </div>

                        <div class="px-6 pb-6">
                            <div class="border-t border-stone-200 pt-4 space-y-2 mb-6">
                                @foreach($srv['features'] as $feat)
                                <div class="flex items-center gap-2 text-xs text-stone-700">
                                    <svg class="w-3.5 h-3.5 text-[#c59b27] shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                    <span>{{ $feat }}</span>
                                </div>
                                @endforeach
                            </div>

                            <a href="#contact" class="w-full py-2.5 rounded-lg bg-stone-50 group-hover:bg-[#14382c] group-hover:text-white text-stone-800 border border-stone-300 text-xs font-semibold text-center block transition">
                                @{{ t('servicesSec.btnConsult') }} &rarr;
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </section>

        <!-- SECTION 6: INSTAGRAM FEED & SOCIAL PROOF -->
        <section id="instagram-gallery" class="py-24 bg-[#0a1f18] text-white border-b border-[#1b3d32]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 gap-4">
                    <div>
                        <span class="text-[#dfb74c] font-bold text-xs uppercase tracking-widest flex items-center gap-2">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            <span>Instagram Activity</span>
                        </span>
                        <h2 class="font-serif-luxury text-3xl font-bold text-white mt-1">
                            Ikuti Keseruan Kami di Instagram @tungbo.id
                        </h2>
                    </div>
                    <a href="{{ $company['instagram'] }}" target="_blank" rel="noopener" class="px-5 py-2.5 rounded-lg bg-[#14382c] hover:bg-[#1b4d3e] text-[#dfb74c] font-semibold text-xs border border-[#c59b27]/40 flex items-center gap-2 transition">
                        <span>Follow @tungbo.id</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </a>
                </div>

                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($instagram_posts as $post)
                    <a href="{{ $company['instagram'] }}" target="_blank" rel="noopener" class="group relative rounded-2xl overflow-hidden border border-[#234b3c] bg-[#112d23] hover:border-[#dfb74c] transition shadow-lg">
                        <div class="h-64 overflow-hidden relative">
                            <img src="{{ $post['image'] }}" alt="{{ $post['title'] }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-4 text-white text-xs font-semibold">
                                <span class="flex items-center gap-1">❤️ {{ $post['likes'] }}</span>
                                <span class="flex items-center gap-1">💬 {{ $post['comments'] }}</span>
                            </div>
                        </div>
                        <div class="p-4 bg-[#0a1f18]">
                            <span class="text-[10px] text-[#dfb74c] font-mono uppercase">{{ $post['category'] }}</span>
                            <p class="text-xs text-stone-200 font-medium truncate mt-1">{{ $post['title'] }}</p>
                        </div>
                    </a>
                    @endforeach
                </div>

            </div>
        </section>

        <!-- SECTION 7: ABOUT US -->
        <section id="about" class="py-24 bg-[#faf8f4] text-stone-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="text-[#14382c] font-bold text-xs uppercase tracking-widest bg-[#14382c]/10 px-3 py-1 rounded">@{{ t('aboutSec.badge') }}</span>
                    <h2 class="font-serif-luxury text-3xl sm:text-4xl font-bold text-[#0a1f18] mt-3">
                        @{{ t('aboutSec.title') }}
                    </h2>
                    <div class="w-16 h-1 bg-[#c59b27] mx-auto mt-4"></div>
                </div>

                <div class="grid lg:grid-cols-12 gap-12 items-center">
                    <div class="lg:col-span-6 space-y-6">
                        <p class="text-stone-700 leading-relaxed text-base sm:text-lg">
                            {{ $about['story'] }}
                        </p>

                        <div class="bg-white p-6 sm:p-8 rounded-2xl border border-stone-200 shadow-sm space-y-5">
                            <div>
                                <h4 class="font-serif-luxury text-lg font-bold text-[#14382c] flex items-center gap-2">
                                    <span class="w-3 h-3 rounded-full bg-[#c59b27]"></span>
                                    @{{ t('aboutSec.visionTitle') }}
                                </h4>
                                <p class="text-sm text-stone-600 mt-1 pl-5 leading-relaxed">{{ $about['vision'] }}</p>
                            </div>
                            <div class="border-t border-stone-100 pt-4">
                                <h4 class="font-serif-luxury text-lg font-bold text-[#14382c] flex items-center gap-2">
                                    <span class="w-3 h-3 rounded-full bg-[#c59b27]"></span>
                                    @{{ t('aboutSec.missionTitle') }}
                                </h4>
                                <ul class="space-y-2 mt-2 pl-5 text-sm text-stone-600">
                                    @foreach($about['missions'] as $mission)
                                    <li class="flex items-start gap-2">
                                        <svg class="w-4 h-4 text-[#c59b27] mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                        <span>{{ $mission }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-6 space-y-4">
                        <div class="grid sm:grid-cols-2 gap-4">
                            @foreach($about['values'] as $val)
                            <div class="bg-white p-6 rounded-2xl border border-stone-200/90 shadow-sm hover:border-[#c59b27] hover:shadow-md transition">
                                <div class="w-10 h-10 rounded-xl bg-[#14382c]/10 text-[#14382c] flex items-center justify-center font-bold font-serif-luxury mb-4 text-lg">
                                    ★
                                </div>
                                <h4 class="font-serif-luxury font-bold text-lg text-[#0a1f18]">{{ $val['title'] }}</h4>
                                <p class="text-xs text-stone-600 mt-2 leading-relaxed">{{ $val['desc'] }}</p>
                            </div>
                            @endforeach
                        </div>

                        <div class="p-6 rounded-2xl bg-gradient-to-r from-[#0f2d23] to-[#14382c] text-white flex flex-col sm:flex-row items-center justify-between gap-4 border border-[#c59b27]/40 shadow-lg">
                            <div>
                                <p class="text-xs text-[#dfb74c] font-semibold uppercase tracking-wider">@{{ t('aboutSec.dualHubTitle') }}</p>
                                <p class="text-sm font-semibold mt-1">📍 @{{ t('aboutSec.dualHubSub') }}</p>
                                <p class="text-xs text-stone-300">@{{ t('aboutSec.dualHubDesc') }}</p>
                            </div>
                            <a href="#contact" class="px-5 py-2.5 rounded-lg bg-[#c59b27] hover:bg-[#dfb74c] text-[#0a1f18] text-xs font-bold transition whitespace-nowrap shadow">
                                @{{ t('aboutSec.btnContact') }}
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- SECTION 8: TESTIMONIALS -->
        <section id="testimonials" class="py-24 bg-white border-t border-stone-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="text-[#c59b27] font-bold text-xs uppercase tracking-widest bg-[#c59b27]/10 px-3 py-1 rounded">@{{ t('testiSec.badge') }}</span>
                    <h2 class="font-serif-luxury text-3xl sm:text-4xl font-bold text-[#0a1f18] mt-3">
                        @{{ t('testiSec.title') }}
                    </h2>
                    <div class="w-16 h-1 bg-[#c59b27] mx-auto mt-4"></div>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    @foreach($testimonials as $testi)
                    <div class="bg-[#faf8f4] p-8 rounded-2xl border border-stone-200/90 shadow-sm flex flex-col justify-between hover:shadow-md transition">
                        <div>
                            <div class="flex text-[#c59b27] text-sm mb-4">
                                @for($i = 0; $i < $testi['rating']; $i++) ★ @endfor
                            </div>
                            <p class="text-stone-700 italic text-sm leading-relaxed mb-6">
                                "{{ $testi['quote'] }}"
                            </p>
                        </div>

                        <div class="border-t border-stone-200 pt-4">
                            <p class="font-serif-luxury font-bold text-base text-[#0a1f18]">{{ $testi['author'] }}</p>
                            <p class="text-xs text-stone-500 mt-0.5">{{ $testi['role'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="mt-16 text-center">
                    <p class="text-xs uppercase tracking-widest text-stone-400 font-semibold mb-6">@{{ t('testiSec.partnersLabel') }}</p>
                    <div class="flex flex-wrap justify-center items-center gap-8 text-stone-500 font-serif-luxury text-xl font-bold">
                        @foreach($partners as $partner)
                        <span class="px-4 py-2 hover:text-[#14382c] transition cursor-default">{{ $partner }}</span>
                        @endforeach
                    </div>
                </div>

            </div>
        </section>

        <!-- SECTION 9: CONTACT FORM POWERED BY VUE COMPONENT -->
        <section id="contact" class="py-24 bg-[#081913] text-white border-t border-[#1b3d32] relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                
                <div class="grid lg:grid-cols-12 gap-12 items-center">
                    <div class="lg:col-span-5 space-y-6">
                        <span class="text-[#dfb74c] font-bold text-xs uppercase tracking-widest bg-[#14382c] px-3.5 py-1 rounded-full border border-[#c59b27]/40">@{{ t('contactSec.badge') }}</span>
                        <h2 class="font-serif-luxury text-3xl sm:text-4xl font-bold text-white">
                            @{{ t('contactSec.title') }}
                        </h2>
                        <p class="text-stone-300 text-sm leading-relaxed">
                            @{{ t('contactSec.desc') }}
                        </p>

                        <div class="space-y-4 pt-4">
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-[#14382c] border border-[#234b3c] flex items-center justify-center text-[#dfb74c] shrink-0">
                                    📍
                                </div>
                                <div>
                                    <p class="text-xs text-stone-400">@{{ t('contactSec.hubsLabel') }}</p>
                                    <p class="text-sm font-semibold text-white">@{{ t('contactSec.hubsVal') }}</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-[#14382c] border border-[#234b3c] flex items-center justify-center text-[#dfb74c] shrink-0">
                                    ✉️
                                </div>
                                <div>
                                    <p class="text-xs text-stone-400">@{{ t('contactSec.emailLabel') }}</p>
                                    <p class="text-sm font-semibold text-[#dfb74c]">{{ $company['email'] }}</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-[#14382c] border border-[#234b3c] flex items-center justify-center text-[#dfb74c] shrink-0">
                                    💬
                                </div>
                                <div>
                                    <p class="text-xs text-stone-400">@{{ t('contactSec.phoneLabel') }}</p>
                                    <p class="text-sm font-semibold text-white">{{ $company['phone'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- VUE COMPONENT: INQUIRY FORM -->
                    <div class="lg:col-span-7">
                        <inquiry-form></inquiry-form>
                    </div>

                </div>
            </div>
        </section>

        <!-- FOOTER -->
        <footer class="bg-[#040e0b] text-stone-400 text-xs py-14 border-t border-[#163a2f]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid md:grid-cols-4 gap-8 mb-10">
                    <div class="space-y-3">
                        <span class="font-serif-luxury text-xl font-bold tracking-wider text-white">TUNGBO INDONESIA</span>
                        <p class="text-stone-400 leading-relaxed text-xs">
                            Penyedia kuliner Korea terpercaya dengan standar cold-chain higienis untuk Horeca, retail swalayan, dan katering acara.
                        </p>
                        <p class="text-[11px] text-stone-500">📍 Hub Kelapa Gading & Bendungan Hilir, Jakarta</p>
                    </div>

                    <div>
                        <h5 class="text-white font-semibold mb-3 tracking-wider uppercase text-[11px]">Koleksi Daging & Menu</h5>
                        <ul class="space-y-2">
                            <li><a href="#products" class="hover:text-white transition">Woosamgyup Sliced Beef</a></li>
                            <li><a href="#products" class="hover:text-white transition">Suwon Galbi Bone-In Ribs</a></li>
                            <li><a href="#products" class="hover:text-white transition">Tungbo Jumulleok Cubes</a></li>
                            <li><a href="#products" class="hover:text-white transition">Classic Japchae & Kimchi</a></li>
                        </ul>
                    </div>

                    <div>
                        <h5 class="text-white font-semibold mb-3 tracking-wider uppercase text-[11px]">Layanan & Distribusi</h5>
                        <ul class="space-y-2">
                            <li><a href="#catering-portfolio" class="hover:text-white transition">Korean BBQ Catering Live Station</a></li>
                            <li><a href="#services" class="hover:text-white transition">Pasokan Rutin Resto & Cafe</a></li>
                            <li><a href="#services" class="hover:text-white transition">Ranch Market & The Foodhall</a></li>
                            <li><a href="{{ $company['tokopedia'] }}" target="_blank" class="hover:text-white transition">Tokopedia @tungbobenhil</a></li>
                        </ul>
                    </div>

                    <div>
                        <h5 class="text-white font-semibold mb-3 tracking-wider uppercase text-[11px]">Koneksi & Order Cepat</h5>
                        <p class="text-stone-400 mb-3">Tersedia di Tokopedia, Shopee, dan update harian di Instagram:</p>
                        <div class="space-y-2">
                            <a href="{{ $company['tokopedia'] }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 px-3 py-2 rounded bg-emerald-900/60 text-emerald-300 hover:text-white font-semibold transition border border-emerald-700/50 w-full">
                                <span>Tokopedia: @tungbobenhil</span>
                            </a>
                            <a href="{{ $company['instagram'] }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 px-3 py-2 rounded bg-[#0f2d23] text-[#dfb74c] hover:text-white font-semibold transition border border-[#234b3c] w-full">
                                <span>Instagram: @tungbo.id</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="pt-8 border-t border-stone-800 flex flex-col sm:flex-row justify-between items-center gap-4 text-stone-500 text-[11px]">
                    <p>&copy; {{ date('Y') }} {{ $company['name'] }}. Seluruh hak cipta dilindungi undang-undang.</p>
                    <div class="flex items-center gap-6">
                        <span class="text-stone-400 font-mono">Platform powered by ComproUniverse</span>
                    </div>
                </div>
            </div>
        </footer>
    </div>

</body>
</html>
