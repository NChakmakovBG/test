@extends('frontend.layouts.app')

@section('title', 'Our Services | LuminaScott')
@section('meta_description', 'Explore LuminaScott\'s comprehensive AI services including strategy consulting, machine learning, automation, data analytics, and training.')

@section('content')
<!-- Hero -->
<section class="pt-32 pb-16 relative hero-grid">
    <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-indigo-500/10 rounded-full blur-3xl animate-pulse-glow"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="text-indigo-400 text-sm font-semibold uppercase tracking-wider">What We Offer</span>
        <h1 class="text-5xl font-bold text-white mt-4 mb-6">Our <span class="gradient-text">Services</span></h1>
        <p class="text-slate-400 max-w-2xl mx-auto text-lg">Comprehensive AI solutions designed to help your business thrive in the age of artificial intelligence.</p>
    </div>
</section>

<!-- Services Grid -->
<section class="py-16 pb-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $service)
            <div class="glass rounded-2xl p-8 card-shine glow-hover transition-all duration-300 group flex flex-col">
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-indigo-500/20 to-violet-500/20 flex items-center justify-center mb-6">
                    <svg class="w-7 h-7 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">{{ $service->title }}</h3>
                <p class="text-slate-400 text-sm leading-relaxed mb-6 flex-grow">{{ $service->excerpt }}</p>
                <a href="{{ route('services.show', $service->slug) }}" class="inline-flex items-center text-sm text-indigo-400 hover:text-indigo-300 font-medium transition-colors">
                    Learn more
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-16 pb-24">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <div class="glass rounded-2xl p-12 glow">
            <h2 class="text-3xl font-bold text-white mb-4">Not sure which service you need?</h2>
            <p class="text-slate-400 mb-8">Get in touch and our team will help you identify the best AI strategy for your business.</p>
            <a href="{{ route('contact.show') }}" class="inline-flex items-center px-8 py-4 rounded-xl font-semibold bg-gradient-to-r from-indigo-500 to-violet-600 text-white shadow-lg shadow-indigo-500/25 hover:shadow-indigo-500/40 transition-all duration-300">
                Book a Free Consultation
            </a>
        </div>
    </div>
</section>
@endsection
