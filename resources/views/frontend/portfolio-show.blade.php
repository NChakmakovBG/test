@extends('frontend.layouts.app')

@section('title', $portfolioItem->title . ' | LuminaScott')
@section('meta_description', $portfolioItem->excerpt)

@section('content')
<section class="pt-32 pb-16 relative hero-grid">
    <div class="absolute top-1/4 right-1/4 w-96 h-96 bg-indigo-500/10 rounded-full blur-3xl animate-pulse-glow"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('portfolio.index') }}" class="inline-flex items-center text-sm text-slate-400 hover:text-indigo-400 mb-6 transition-colors">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Back to Portfolio
        </a>
        @if($portfolioItem->category)
        <span class="inline-block px-3 py-1 rounded-full bg-indigo-500/20 text-indigo-300 text-sm font-medium mb-4">{{ $portfolioItem->category }}</span>
        @endif
        <h1 class="text-5xl font-bold text-white mb-6">{{ $portfolioItem->title }}</h1>
        <p class="text-xl text-slate-400 max-w-3xl">{{ $portfolioItem->excerpt }}</p>
    </div>
</section>

<section class="py-16 pb-24">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($portfolioItem->image)
        <div class="rounded-2xl overflow-hidden mb-12">
            <img src="{{ Storage::url($portfolioItem->image) }}" alt="{{ $portfolioItem->title }}" class="w-full h-80 object-cover">
        </div>
        @endif

        <!-- Info Cards -->
        <div class="grid sm:grid-cols-3 gap-6 mb-12">
            @if($portfolioItem->client_name)
            <div class="glass rounded-xl p-6">
                <div class="text-xs text-slate-500 uppercase tracking-wider mb-1">Client</div>
                <div class="text-white font-semibold">{{ $portfolioItem->client_name }}</div>
            </div>
            @endif
            @if($portfolioItem->category)
            <div class="glass rounded-xl p-6">
                <div class="text-xs text-slate-500 uppercase tracking-wider mb-1">Sector</div>
                <div class="text-white font-semibold">{{ $portfolioItem->category }}</div>
            </div>
            @endif
            @if($portfolioItem->technologies)
            <div class="glass rounded-xl p-6">
                <div class="text-xs text-slate-500 uppercase tracking-wider mb-1">Technologies</div>
                <div class="flex flex-wrap gap-1 mt-1">
                    @foreach($portfolioItem->technologies as $tech)
                    <span class="px-2 py-0.5 rounded bg-indigo-500/20 text-indigo-300 text-xs">{{ $tech }}</span>
                    @endforeach
                </div>
            </div>
            @endif
        </div>

        <div class="prose prose-invert prose-lg max-w-none prose-headings:text-white prose-p:text-slate-300 prose-li:text-slate-300 prose-strong:text-white">
            {!! $portfolioItem->description !!}
        </div>

        <div class="mt-16 glass rounded-2xl p-10 text-center glow">
            <h3 class="text-2xl font-bold text-white mb-4">Interested in a similar project?</h3>
            <p class="text-slate-400 mb-8">Let us help you achieve the same transformative results.</p>
            <a href="{{ route('contact.show') }}" class="inline-flex items-center px-8 py-4 rounded-xl font-semibold bg-gradient-to-r from-indigo-500 to-violet-600 text-white shadow-lg shadow-indigo-500/25 transition-all duration-300">
                Start a Conversation
            </a>
        </div>
    </div>
</section>
@endsection
