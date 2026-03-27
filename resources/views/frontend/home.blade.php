@extends('frontend.layouts.app')

@section('title', 'LuminaScott | Pioneering AI Implementation')
@section('meta_description', 'LuminaScott is a leading AI implementation consultancy. We help businesses harness the power of artificial intelligence to drive growth, efficiency, and innovation.')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden hero-grid">
    <!-- Background Effects -->
    <div class="absolute inset-0">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-indigo-500/10 rounded-full blur-3xl animate-pulse-glow"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-violet-500/10 rounded-full blur-3xl animate-pulse-glow" style="animation-delay: 2s;"></div>
        <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-cyan-500/5 rounded-full blur-3xl animate-pulse-glow" style="animation-delay: 4s;"></div>
    </div>

    <!-- Floating Shapes -->
    <div class="absolute top-20 right-20 w-20 h-20 border border-indigo-500/20 rounded-lg rotate-45 animate-float hidden lg:block"></div>
    <div class="absolute bottom-32 left-16 w-16 h-16 border border-violet-500/20 rounded-full animate-float-delayed hidden lg:block"></div>
    <div class="absolute top-40 left-1/3 w-12 h-12 border border-cyan-500/20 rounded-lg rotate-12 animate-float hidden lg:block" style="animation-delay: 1s;"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center py-32">
        <div class="animate-slide-up">
            <div class="inline-flex items-center px-4 py-2 rounded-full glass-light text-sm text-indigo-300 mb-8">
                <span class="w-2 h-2 bg-indigo-400 rounded-full mr-2 animate-pulse"></span>
                Pioneering AI Solutions for British Businesses
            </div>

            <h1 class="text-5xl sm:text-6xl lg:text-7xl font-black leading-tight mb-8">
                <span class="text-white">Transforming Businesses</span><br>
                <span class="gradient-text">Through Artificial</span><br>
                <span class="gradient-text">Intelligence</span>
            </h1>

            <p class="text-lg sm:text-xl text-slate-400 max-w-3xl mx-auto mb-12 leading-relaxed">
                We partner with forward-thinking organisations to design, build, and deploy bespoke
                AI solutions that drive measurable results. From strategy to implementation,
                LuminaScott is your trusted AI consultancy.
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('services.index') }}" class="w-full sm:w-auto px-8 py-4 rounded-xl font-semibold bg-gradient-to-r from-indigo-500 to-violet-600 hover:from-indigo-400 hover:to-violet-500 text-white shadow-lg shadow-indigo-500/25 hover:shadow-indigo-500/40 transition-all duration-300 text-center">
                    Explore Our Services
                </a>
                <a href="{{ route('contact.show') }}" class="w-full sm:w-auto px-8 py-4 rounded-xl font-semibold glass hover:bg-white/10 text-white transition-all duration-300 text-center">
                    Get in Touch
                    <svg class="inline-block w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Scroll indicator -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
        <svg class="w-6 h-6 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
    </div>
</section>

<!-- About Snippet -->
<section class="py-24 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <span class="text-indigo-400 text-sm font-semibold uppercase tracking-wider">Who We Are</span>
                <h2 class="text-4xl font-bold text-white mt-4 mb-6">London's Premier<br><span class="gradient-text">AI Consultancy</span></h2>
                <p class="text-slate-400 leading-relaxed mb-6">
                    Founded in the heart of London, LuminaScott is dedicated to helping businesses navigate the transformative world of artificial intelligence. We believe every organisation deserves access to cutting-edge AI solutions that deliver real, measurable results.
                </p>
                <p class="text-slate-400 leading-relaxed mb-8">
                    Our team of seasoned AI researchers, data scientists, and business consultants work collaboratively with your team to understand your unique challenges and develop tailored strategies that integrate seamlessly with your existing operations.
                </p>
                <a href="{{ url('/page/about') }}" class="inline-flex items-center text-indigo-400 hover:text-indigo-300 font-medium transition-colors">
                    Learn more about us
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-2 gap-6">
                <div class="glass rounded-2xl p-8 text-center glow-hover transition-all duration-300">
                    <div class="text-4xl font-black gradient-text mb-2">50+</div>
                    <div class="text-slate-400 text-sm">Projects Delivered</div>
                </div>
                <div class="glass rounded-2xl p-8 text-center glow-hover transition-all duration-300">
                    <div class="text-4xl font-black gradient-text mb-2">98%</div>
                    <div class="text-slate-400 text-sm">Client Satisfaction</div>
                </div>
                <div class="glass rounded-2xl p-8 text-center glow-hover transition-all duration-300">
                    <div class="text-4xl font-black gradient-text mb-2">15+</div>
                    <div class="text-slate-400 text-sm">Industry Sectors</div>
                </div>
                <div class="glass rounded-2xl p-8 text-center glow-hover transition-all duration-300">
                    <div class="text-4xl font-black gradient-text mb-2">24/7</div>
                    <div class="text-slate-400 text-sm">Dedicated Support</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services -->
<section class="py-24 relative">
    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-indigo-500/5 to-transparent"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-indigo-400 text-sm font-semibold uppercase tracking-wider">What We Do</span>
            <h2 class="text-4xl font-bold text-white mt-4">Our <span class="gradient-text">Services</span></h2>
            <p class="text-slate-400 mt-4 max-w-2xl mx-auto">Comprehensive AI solutions tailored to your business needs, from strategic consulting to full-scale implementation.</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($featuredServices as $service)
            <div class="glass rounded-2xl p-8 card-shine glow-hover transition-all duration-300 group">
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-indigo-500/20 to-violet-500/20 flex items-center justify-center mb-6 group-hover:from-indigo-500/30 group-hover:to-violet-500/30 transition-all duration-300">
                    @if($service->icon === 'strategy')
                    <svg class="w-7 h-7 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                    @elseif($service->icon === 'brain')
                    <svg class="w-7 h-7 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                    @elseif($service->icon === 'cog')
                    <svg class="w-7 h-7 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    @else
                    <svg class="w-7 h-7 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    @endif
                </div>
                <h3 class="text-xl font-bold text-white mb-3">{{ $service->title }}</h3>
                <p class="text-slate-400 text-sm leading-relaxed mb-6">{{ $service->excerpt }}</p>
                <a href="{{ route('services.show', $service->slug) }}" class="inline-flex items-center text-sm text-indigo-400 hover:text-indigo-300 font-medium transition-colors">
                    Learn more
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('services.index') }}" class="inline-flex items-center px-6 py-3 rounded-xl glass hover:bg-white/10 text-white font-medium transition-all duration-300">
                View All Services
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>

<!-- Portfolio -->
@if($portfolioItems->count())
<section class="py-24 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-indigo-400 text-sm font-semibold uppercase tracking-wider">Our Work</span>
            <h2 class="text-4xl font-bold text-white mt-4">Featured <span class="gradient-text">Projects</span></h2>
            <p class="text-slate-400 mt-4 max-w-2xl mx-auto">Discover how we have helped organisations across diverse sectors harness the power of AI.</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($portfolioItems->take(6) as $item)
            <a href="{{ route('portfolio.show', $item->slug) }}" class="glass rounded-2xl overflow-hidden group glow-hover transition-all duration-300">
                <div class="h-48 bg-gradient-to-br from-indigo-500/20 to-violet-500/20 flex items-center justify-center relative overflow-hidden">
                    @if($item->image)
                    <img src="{{ Storage::url($item->image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    @else
                    <svg class="w-16 h-16 text-indigo-500/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>
                    @endif
                    @if($item->category)
                    <span class="absolute top-4 left-4 px-3 py-1 rounded-full bg-indigo-500/80 text-white text-xs font-medium backdrop-blur-sm">{{ $item->category }}</span>
                    @endif
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-bold text-white mb-2 group-hover:text-indigo-300 transition-colors">{{ $item->title }}</h3>
                    <p class="text-slate-400 text-sm leading-relaxed">{{ $item->excerpt }}</p>
                </div>
            </a>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('portfolio.index') }}" class="inline-flex items-center px-6 py-3 rounded-xl glass hover:bg-white/10 text-white font-medium transition-all duration-300">
                View Full Portfolio
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>
@endif

<!-- Testimonials -->
@if($testimonials->count())
<section class="py-24 relative" x-data="{ active: 0, total: {{ $testimonials->count() }} }">
    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-violet-500/5 to-transparent"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-indigo-400 text-sm font-semibold uppercase tracking-wider">Testimonials</span>
            <h2 class="text-4xl font-bold text-white mt-4">What Our <span class="gradient-text">Clients Say</span></h2>
        </div>

        <div class="max-w-4xl mx-auto relative">
            @foreach($testimonials as $index => $testimonial)
            <div x-show="active === {{ $index }}"
                 x-transition:enter="transition ease-out duration-500"
                 x-transition:enter-start="opacity-0 translate-y-4"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="glass rounded-2xl p-10 md:p-14 text-center glow">
                <svg class="w-12 h-12 text-indigo-500/30 mx-auto mb-8" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                <p class="text-lg md:text-xl text-slate-300 leading-relaxed mb-8 italic">"{{ $testimonial->content }}"</p>
                <div class="flex items-center justify-center space-x-1 mb-4">
                    @for($i = 0; $i < $testimonial->rating; $i++)
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
                <div class="font-semibold text-white">{{ $testimonial->client_name }}</div>
                <div class="text-sm text-slate-400">{{ $testimonial->client_position }}@if($testimonial->client_company), {{ $testimonial->client_company }}@endif</div>
            </div>
            @endforeach

            <!-- Navigation -->
            <div class="flex items-center justify-center space-x-4 mt-8">
                <button @click="active = (active - 1 + total) % total" class="w-10 h-10 rounded-full glass hover:bg-white/10 flex items-center justify-center text-slate-400 hover:text-white transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <div class="flex space-x-2">
                    @foreach($testimonials as $index => $t)
                    <button @click="active = {{ $index }}" :class="active === {{ $index }} ? 'bg-indigo-500' : 'bg-white/20'" class="w-2.5 h-2.5 rounded-full transition-all duration-300"></button>
                    @endforeach
                </div>
                <button @click="active = (active + 1) % total" class="w-10 h-10 rounded-full glass hover:bg-white/10 flex items-center justify-center text-slate-400 hover:text-white transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Team -->
@if($teamMembers->count())
<section class="py-24 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-indigo-400 text-sm font-semibold uppercase tracking-wider">Our Team</span>
            <h2 class="text-4xl font-bold text-white mt-4">Meet the <span class="gradient-text">Experts</span></h2>
            <p class="text-slate-400 mt-4 max-w-2xl mx-auto">A dedicated team of AI specialists, engineers, and strategists committed to your success.</p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($teamMembers as $member)
            <div class="glass rounded-2xl overflow-hidden group glow-hover transition-all duration-300">
                <div class="h-64 bg-gradient-to-br from-indigo-500/20 to-violet-500/20 flex items-center justify-center relative">
                    @if($member->photo)
                    <img src="{{ Storage::url($member->photo) }}" alt="{{ $member->name }}" class="w-full h-full object-cover">
                    @else
                    <div class="w-24 h-24 rounded-full bg-gradient-to-br from-indigo-500/30 to-violet-500/30 flex items-center justify-center">
                        <span class="text-3xl font-bold text-indigo-300">{{ substr($member->name, 0, 1) }}</span>
                    </div>
                    @endif
                    <!-- Social overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-end justify-center pb-6">
                        <div class="flex space-x-3">
                            @if($member->linkedin)
                            <a href="{{ $member->linkedin }}" target="_blank" rel="noopener" class="w-9 h-9 rounded-lg bg-white/10 hover:bg-indigo-500/50 flex items-center justify-center text-white transition-all">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                            </a>
                            @endif
                            @if($member->email)
                            <a href="mailto:{{ $member->email }}" class="w-9 h-9 rounded-lg bg-white/10 hover:bg-indigo-500/50 flex items-center justify-center text-white transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="p-6 text-center">
                    <h3 class="text-lg font-bold text-white">{{ $member->name }}</h3>
                    <p class="text-sm text-indigo-400 mt-1">{{ $member->position }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="py-24 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative rounded-3xl overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-indigo-600 to-violet-600"></div>
            <div class="absolute inset-0 hero-grid opacity-20"></div>
            <div class="absolute top-0 right-0 w-96 h-96 bg-white/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>

            <div class="relative px-8 py-16 md:px-16 md:py-20 text-center">
                <h2 class="text-3xl md:text-5xl font-bold text-white mb-6">Ready to Transform<br>Your Business?</h2>
                <p class="text-lg text-indigo-100 max-w-2xl mx-auto mb-10">
                    Let us help you unlock the full potential of artificial intelligence. Get in touch today for a free consultation.
                </p>
                <a href="{{ route('contact.show') }}" class="inline-flex items-center px-8 py-4 rounded-xl font-semibold bg-white text-indigo-600 hover:bg-indigo-50 shadow-lg transition-all duration-300">
                    Start Your AI Journey
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
