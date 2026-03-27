@extends('frontend.layouts.app')

@section('title', $service->title . ' | LuminaScott')
@section('meta_description', $service->excerpt)

@section('content')
<!-- Hero -->
<section class="pt-32 pb-16 relative hero-grid">
    <div class="absolute top-1/4 right-1/4 w-96 h-96 bg-indigo-500/10 rounded-full blur-3xl animate-pulse-glow"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('services.index') }}" class="inline-flex items-center text-sm text-slate-400 hover:text-indigo-400 mb-6 transition-colors">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Back to Services
        </a>
        <h1 class="text-5xl font-bold text-white mb-6">{{ $service->title }}</h1>
        <p class="text-xl text-slate-400 max-w-3xl">{{ $service->excerpt }}</p>
    </div>
</section>

<!-- Content -->
<section class="py-16 pb-24">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($service->image)
        <div class="rounded-2xl overflow-hidden mb-12">
            <img src="{{ Storage::url($service->image) }}" alt="{{ $service->title }}" class="w-full h-80 object-cover">
        </div>
        @endif

        <div class="prose prose-invert prose-lg max-w-none prose-headings:text-white prose-p:text-slate-300 prose-li:text-slate-300 prose-strong:text-white prose-a:text-indigo-400">
            {!! $service->description !!}
        </div>

        <div class="mt-16 glass rounded-2xl p-10 text-center glow">
            <h3 class="text-2xl font-bold text-white mb-4">Interested in {{ $service->title }}?</h3>
            <p class="text-slate-400 mb-8">Contact us to discuss how we can help your business.</p>
            <a href="{{ route('contact.show') }}" class="inline-flex items-center px-8 py-4 rounded-xl font-semibold bg-gradient-to-r from-indigo-500 to-violet-600 text-white shadow-lg shadow-indigo-500/25 transition-all duration-300">
                Get in Touch
            </a>
        </div>
    </div>
</section>
@endsection
