@extends('frontend.layouts.app')

@section('title', 'Portfolio | LuminaScott')
@section('meta_description', 'Explore our portfolio of AI implementation projects across healthcare, finance, logistics, retail, and more.')

@section('content')
<section class="pt-32 pb-16 relative hero-grid">
    <div class="absolute top-1/4 right-1/4 w-96 h-96 bg-violet-500/10 rounded-full blur-3xl animate-pulse-glow"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="text-indigo-400 text-sm font-semibold uppercase tracking-wider">Our Work</span>
        <h1 class="text-5xl font-bold text-white mt-4 mb-6">Our <span class="gradient-text">Portfolio</span></h1>
        <p class="text-slate-400 max-w-2xl mx-auto text-lg">Discover how we have helped organisations across diverse sectors harness the power of AI to solve real business challenges.</p>
    </div>
</section>

<section class="py-16 pb-24" x-data="{ filter: 'all' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Filter Buttons -->
        @php $categories = $portfolioItems->pluck('category')->filter()->unique()->values(); @endphp
        @if($categories->count() > 1)
        <div class="flex flex-wrap justify-center gap-3 mb-12">
            <button @click="filter = 'all'" :class="filter === 'all' ? 'bg-indigo-500 text-white' : 'glass text-slate-300 hover:text-white'" class="px-5 py-2 rounded-full text-sm font-medium transition-all duration-200">All Projects</button>
            @foreach($categories as $category)
            <button @click="filter = '{{ $category }}'" :class="filter === '{{ $category }}' ? 'bg-indigo-500 text-white' : 'glass text-slate-300 hover:text-white'" class="px-5 py-2 rounded-full text-sm font-medium transition-all duration-200">{{ $category }}</button>
            @endforeach
        </div>
        @endif

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($portfolioItems as $item)
            <div x-show="filter === 'all' || filter === '{{ $item->category }}'" x-transition class="glass rounded-2xl overflow-hidden group glow-hover transition-all duration-300">
                <a href="{{ route('portfolio.show', $item->slug) }}">
                    <div class="h-52 bg-gradient-to-br from-indigo-500/20 to-violet-500/20 flex items-center justify-center relative overflow-hidden">
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
                        <p class="text-slate-400 text-sm leading-relaxed mb-4">{{ $item->excerpt }}</p>
                        @if($item->technologies)
                        <div class="flex flex-wrap gap-2">
                            @foreach($item->technologies as $tech)
                            <span class="px-2 py-1 rounded-md bg-white/5 text-xs text-slate-400">{{ $tech }}</span>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
