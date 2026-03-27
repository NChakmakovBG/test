@extends('frontend.layouts.app')

@section('title', ($page->meta_title ?: $page->title) . ' | LuminaScott')
@section('meta_description', $page->meta_description ?? '')
@section('meta_keywords', $page->meta_keywords ?? '')

@section('content')
<section class="pt-32 pb-16 relative hero-grid">
    <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-indigo-500/10 rounded-full blur-3xl animate-pulse-glow"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-5xl font-bold text-white mb-6">{{ $page->title }}</h1>
    </div>
</section>

<section class="py-16 pb-24">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($page->featured_image)
        <div class="rounded-2xl overflow-hidden mb-12">
            <img src="{{ Storage::url($page->featured_image) }}" alt="{{ $page->title }}" class="w-full h-80 object-cover">
        </div>
        @endif

        <div class="prose prose-invert prose-lg max-w-none prose-headings:text-white prose-p:text-slate-300 prose-li:text-slate-300 prose-strong:text-white prose-a:text-indigo-400 prose-ul:text-slate-300">
            {!! $page->content !!}
        </div>
    </div>
</section>
@endsection
